<?php
/**
 * Created by PhpStorm.
 * User: Lâm Quang Hà
 * Date: 09/08/2021
 * Time: 23:30 AM
 */

namespace app\modules\frontend\controllers;

use app\models\DmNganhNghe;
use app\models\SuKien;
use app\models\SuKienSearch;
use app\models\SuKienView;
use app\modules\frontend\base\FrontendBaseController;
use Yii;
use yii\data\Pagination;

class SuKienController extends FrontendBaseController
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $q = $request->get('q');
        $c = $request->get('c');
        // dd($q,$c);
        if($request->isPost){   
            $q = $request->post('q');
            $c = $request->post('c');
            
            return $this->redirect(Yii::$app->urlManager->createUrl("su-kien?q=$q&c=$c"));
        }
        // dd($q,$c);
        $nganhnghe = DmNganhNghe::find()->all();
        $query = SuKien::find()->filterWhere(['nganhnghe_id' => $c])->andFilterWhere(['like','upper(ten_su_kien)',mb_strtoupper($q)])->orderBy('thoi_gian_dang desc');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 10]);
        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'nganhnghe' => $nganhnghe,
            'model' => $model,
            'pagination' => $pagination,
            'c' => $c,
            'q' => $q,
        ]);
    }

    public function actionView($slug)
    {
        $model = SuKien::findOne(['slug' => $slug]);

        if ($model == null) {
            return $this->render('notfound');
        }
        $modelsukien=new SuKienView();
        $modelsukien->sukien_id=$model->id;
        $modelsukien->save();
        return $this->render('view', [
            'model' => $model
        ]);
    }
    

    

    
}
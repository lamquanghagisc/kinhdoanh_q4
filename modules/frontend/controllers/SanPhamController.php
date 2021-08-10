<?php
/**
 * Created by PhpStorm.
 * User: Lâm Quang Hà
 * Date: 09/08/2021
 * Time: 23:30 AM
 */

namespace app\modules\frontend\controllers;

use app\models\DmNganhNghe;
use app\models\SanPham;
use app\models\SanPhamSearch;

use app\modules\frontend\base\FrontendBaseController;
use Yii;
use yii\data\Pagination;

class SanPhamController extends FrontendBaseController
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
            
            return $this->redirect(Yii::$app->urlManager->createUrl("san-pham?q=$q&c=$c"));
        }
        // dd($q,$c);
        $nganhnghe = DmNganhNghe::find()->all();
        $query = SanPham::find()->filterWhere(['nganhnghe_id' => $c])->andFilterWhere(['like','upper(ten_san_pham)',mb_strtoupper($q)])->orderBy('thoi_gian_dang desc');
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
        $model = SanPham::findOne(['slug' => $slug]);

        if ($model == null) {
            return $this->render('notfound');
        }

        return $this->render('view', [
            'model' => $model
        ]);
    }
    

    

    
}
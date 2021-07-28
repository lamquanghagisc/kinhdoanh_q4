<?php
/**
 * Created by PhpStorm.
 * User: Lâm Quang Hà
 * Date: 27/07/2021
 * Time: 23:30 AM
 */

namespace app\modules\frontend\controllers;

use app\models\DmLoaitin;
use app\models\TinTuc;
use app\models\TinTucSearch;
use app\models\Video;
use app\modules\frontend\base\FrontendBaseController;
use Yii;
use yii\data\Pagination;

class VideoController extends FrontendBaseController
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $q = $request->get('q');
        $c = $request->get('c');
        if($request->isPost){
            
            $q = $request->post('q');
            $c = $request->post('c');
            return $this->redirect(Yii::$app->urlManager->createUrl("video?q=$q&c=$c"));
        }
        $loaitin = DmLoaitin::find()->all();
        $query = Video::find()->filterWhere(['loaitin_id' => $c])->andFilterWhere(['like','upper(tieu_de)',mb_strtoupper($q)])->orderBy('thoi_gian_dang desc');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 10]);
        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'loaitin' => $loaitin,
            'model' => $model,
            'pagination' => $pagination,
            'c' => $c,
            'q' => $q,
        ]);
    }

    public function actionView($alias)
    {
        $model = Video::findOne(['alias_title' => $alias]);

        if ($model == null) {
            return $this->render('notfound');
        }

        return $this->render('view', [
            'model' => $model
        ]);
    }
    

    

    
}
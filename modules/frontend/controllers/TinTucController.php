<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/7/2021
 * Time: 12:06 PM
 */

namespace app\modules\frontend\controllers;

use app\models\DmLoaitin;
use app\models\TinTuc;
use app\models\TinTucSearch;
use app\modules\frontend\base\FrontendBaseController;
use Yii;
use yii\data\Pagination;

class TinTucController extends FrontendBaseController
{
    public function actionIndex(){
        $searchModel = new TinTucSearch();
        $dataProvider = $searchModel->searchloaitin(Yii::$app->request->queryParams);
        $dsloaitin=DmLoaitin::find()->all();
        // dd($dataProvider->models);
        $query = TinTuc::find()->orderBy('thoi_gian_dang desc');
    //    dd($query);
        $count = $query->count();
        
        $pagination = new Pagination(['totalCount' => $count,'pageSize' => 10]);
        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
     
        return $this->render('index',[
            'dsloaitin' =>$dsloaitin,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }

    public function actionView($alias){
        $model = TinTuc::findOne(['alias_title' => $alias]);

        if($model == null){
            return $this->render('notfound');
        }

        return $this->render('view',[
            'model' => $model
        ]);
    }
    public function actionLoaitin($id){
        $dsloaitin=DmLoaitin::find()->all();
        // dd($id);
        $query = TinTuc::find()->where(['loaitin_id' => $id])->orderBy(['thoi_gian_dang' => SORT_DESC]);
        // $query = TinTuc::find()->where(['loaitin_id' => $id])->orderBy('thoi_gian_dang desc')->one();
        $count = $query->count();
      
        $pagination = new Pagination(['totalCount' => $count,'pageSize' => 10]);
        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        if($model == null){
            return $this->render('Không có dữ liệu');
        }

        return $this->render('loaitin',[
            'dsloaitin' =>$dsloaitin,
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }
}
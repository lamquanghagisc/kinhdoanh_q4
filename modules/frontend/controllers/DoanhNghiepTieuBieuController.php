<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/7/2021
 * Time: 12:06 PM
 */

namespace app\modules\frontend\controllers;


use app\models\TinTuc;
use app\models\VDoanhnghiep;
use app\modules\frontend\base\FrontendBaseController;
use app\services\DebugService;
use yii\data\Pagination;

class DoanhNghiepTieuBieuController extends FrontendBaseController
{
    public function actionIndex(){
        $query = VDoanhnghiep::find()->where(['tieu_bieu' => 1]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize' => 10]);
        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index',[
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }

    public function actionView($alias){
        $id = (integer)substr($alias,1);
        $model = VDoanhnghiep::findOne(['id_doanhnghiep' => $id]);
        if($model == null){
            return $this->render('notfound');
        }

        return $this->render('view',[
            'model' => $model
        ]);
    }
}
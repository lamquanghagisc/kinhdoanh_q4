<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/29/2021
 * Time: 8:50 PM
 */

namespace app\modules\backend\controllers;


use app\modules\backend\base\FrontendBaseController;
use app\modules\backend\models\VKho;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class DashboardController extends FrontendBaseController
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionStore(){
        $dataProvider = new ActiveDataProvider([
            'query' => VKho::find(),
            'sort' => [
                'defaultOrder' => [
                    'sp' => SORT_ASC,
                ]
            ],
        ]);


        return $this->render('store',[
            'dataProvider' => $dataProvider,
        ]);
    }
}
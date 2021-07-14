<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/30/2021
 * Time: 9:57 AM
 */

namespace app\modules\backend\controllers;


use app\modules\backend\base\FrontendBaseController;

class DonmuaController extends FrontendBaseController
{
    public function actionIndex(){
        return $this->render('index');
    }
}
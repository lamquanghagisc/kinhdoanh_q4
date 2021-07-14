<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/29/2021
 * Time: 8:53 PM
 */

namespace app\modules\backend\base;


use app\services\DebugService;
use yii\web\Controller;

class BackendBaseController extends Controller
{
    public $ACTIVE = 1;
    public $INACTIVE = 0;
    public $SOLD = 2;

    public function actions(){

        $this->layout = "@app/modules/backend/views/layouts/main";
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
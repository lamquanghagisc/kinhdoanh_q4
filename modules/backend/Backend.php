<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/29/2021
 * Time: 8:39 PM
 */

namespace app\modules\backend;


use app\services\DebugService;
use yii\base\Module;
use yii\web\ErrorHandler;

class Backend extends Module
{
    public function init(){
        parent::init();

        \Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'class' => ErrorHandler::className(),
                    'errorAction' => 'admin/dashboard/error',
                ]
            ],
            'params' => [
                'bsVersion' => '4.x'
            ],
        ]);


        /** @var ErrorHandler $handler */
        $handler = $this->get('errorHandler');
        \Yii::$app->set('errorHandler', $handler);
        $handler->register();


//        $params = $this->get('params');
//        \Yii::$app->set('params', $params);
//        $params->register();
    }
}
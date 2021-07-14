<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/4/2021
 * Time: 8:40 AM
 */

namespace app\modules\frontend;

use app\services\DebugService;
use yii\web\ErrorHandler;

class Frontend extends \yii\base\Module
{
    public function init(){
        parent::init();
//        \Yii::$app->setHomeUrl(\Yii::$app->urlManager->createUrl(['home']));

        \Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'class' => ErrorHandler::className(),
                    'errorAction' => 'user/site/error',
                ],
            ],
        ]);


        /** @var ErrorHandler $handler */
        $handler = $this->get('errorHandler');
        \Yii::$app->set('errorHandler', $handler);
        $handler->register();


//        DebugService::dumpdie($this);
//        $params = $this->get('params');
//        \Yii::$app->set('params', $params);
//        $params->register();
    }
}
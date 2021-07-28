<?php
/* Include debug functions */
require_once(__DIR__.'/functions.php');
require(__DIR__ . '/../common/models/Api.php');
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'userCounter' => [
            'class' => 'app\components\UserCounter',
            // You can setup these options:
            'tableUsers' => 'pcounter_users',
            'tableSave' => 'pcounter_save',
            'autoInstallTables' => true,
            'onlineTime' => 10, // min
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'forceCopy' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '<i>(Chưa có dữ liệu)</i>',
            'defaultTimeZone' => 'UTC',
            'timeZone' => 'Asia/Kolkata',
            // 'dateFormat' => 'dd-MM-YY',
        ],
        // 'siteApi' => [
        //     'class' => 'mongosoft\soapclient\Client',
        //     'url' => 'http://116.193.64.9/CPKT_API/CPKD_API.asmx?wsdl',
        //     'options' => [
        //         'cache_wsdl' => WSDL_CACHE_NONE,
        //     ],
        // ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'kinhdoanhq6',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\auth\Taikhoan',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                'lien-he' => 'user/site/contact',
                'tra-cuu-vi-tri' => 'user/map/bando',
                'tin-tuc' => 'user/tin-tuc/index',
                'video' => 'user/video/index',
//                'tin-tuc/<alias:[\w\d\-]+>' => 'user/tin-tuc/view',
//                'doanh-nghiep-tieu-bieu' => 'user/doanh-nghiep-tieu-bieu/index',
//                'doanh-nghiep-tieu-bieu/<alias:[\w\d\-]+>' => 'user/doanh-nghiep-tieu-bieu/view',
                [
                    'pattern' => 'tin-tuc/<page:\d+>',
                    'route' => 'user/tin-tuc/index',
                    'defaults' => ['page' => 1],
                ],
                [
                    'pattern' => 'video/<page:\d+>',
                    'route' => 'user/video/index',
                    'defaults' => ['page' => 1],
                ],
                [
                    'pattern' => 'tin-tuc/<alias:[\w\d\-]+>',
                    'route' => 'user/tin-tuc/view',
                ],
                [
                    'pattern' => 'video/<alias:[\w\d\-]+>',
                    'route' => 'user/video/view',
                ],
                [
                    'pattern' => 'tin-tuc/loaitin/<id:[\w\d\-]+>',
                    'route' => 'user/tin-tuc/loaitin',
                ],
                [
                    'pattern' => 'doanh-nghiep-tieu-bieu/<page:\d+>',
                    'route' => 'user/doanh-nghiep-tieu-bieu/index',
                    'defaults' => ['page' => 1,],
                ],
                [
                    'pattern' => 'doanh-nghiep-tieu-bieu/<alias:[\w\d\-]+>',
                    'route' => 'user/doanh-nghiep-tieu-bieu/view',
                ],
            ],
        ],
    ],
    'defaultRoute' => 'user/site/index',
    'modules' => [
        'social' => [//like, share plugin kartik-v/yii2-social
            // the module class
            'class' => 'kartik\social\Module',
     
            // the global settings for the facebook widget
            'facebook' => [//đăng ký https://developers.facebook.com/apps
                'appId' => '996352967768149',
                'app_secret' => '21de6470edd7cfac341610b55ab191d1',
            ],
        ],
        'maps' => [
            'class' => 'app\modules\maps\Map',
//            'defaultRoute' => 'maps'
        ],
        'auth' => [
            'class' => 'app\modules\auth\Auth',
//            'defaultRoute' => 'maps'
        ],
        'user' => [
            'class' => 'app\modules\frontend\Frontend',
//            'defaultRoute' => 'maps'
        ],
        'admin' => [
            'class' => 'app\modules\backend\Backend',
//            'defaultRoute' => 'maps'
        ],
        'tintuc' => [
            'class' => 'app\modules\tintuc\Tintuc',
        ],
        
    ],
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    //$config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
//    $config['modules']['gridview'] = [
//        'class' => 'kartik\grid\Module',
//    ];
    $config['modules']['gridview'] = [
        'class' => 'app\modules\DCrud\Module',
    ];
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],
        'generators' => [
            'DCrud' => [
                'class' => 'app\modules\DCrud\generators\Generator',
//                'templates' => [
//                    'my' => '@app/myTemplates/crud/default',
//                ]
            ]
        ],
    ];
}

return $config;

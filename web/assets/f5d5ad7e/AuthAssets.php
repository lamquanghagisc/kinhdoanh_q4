<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/29/2021
 * Time: 8:41 PM
 */

namespace app\modules\auth\assets;


use yii\web\AssetBundle;

class AuthAssets extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $sourcePath = '@app/modules/auth/assets';

    public $css = [
//        'css/bootstrap.min.css',
        'fonts/font-awesome-4.7.0/css/font-awesome.min.css',
        'fonts/iconic/css/material-design-iconic-font.min.css',
        'css/util.css',
        'css/main.css',
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
    ];
}
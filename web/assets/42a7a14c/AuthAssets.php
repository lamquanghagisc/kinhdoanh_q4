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
        'css/dashmix.min-3.2.css',
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
    ];
}
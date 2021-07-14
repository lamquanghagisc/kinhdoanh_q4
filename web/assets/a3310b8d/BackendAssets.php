<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/29/2021
 * Time: 8:41 PM
 */

namespace app\modules\backend\assets;


use yii\web\AssetBundle;

class BackendAssets extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $sourcePath = '@app/modules/backend/assets';

    public $css = [
        'css/dashmix.min-3.2.css',
        'css/custom.css',
    ];
    public $js = [
        'js/dashmix.core.min-3.2.js',
        'js/dashmix.app.min-3.2.js',
    ];
}
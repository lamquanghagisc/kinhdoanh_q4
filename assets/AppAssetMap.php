<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetMap extends AssetBundle {

    public $basePath = '@webroot/resources';
    public $baseUrl = '@web/resources';
    public $jsOptions = [ 'position' => \yii\web\View::POS_HEAD];
    public $css = [

        // 'css/simple-line-icons.min.css',
        //'css/leaflet.css',
        //   'css/leaflet-measure.css',
        //  'css/MarkerCluster.css',
        'css/map/bootstrap.css',
        'css/map/bootstrap-select.min.css',
        'css/map/owl.carousel.css',
        'css/map/jquery.mCustomScrollbar.css',
        'css/map/jquery.nouislider.min.css',
     //   'css/leaflet-search.css',
        'css/map/green.css',
        'css/map/user.style.css',
    ];
    public $js = [
        'js/map/jquery-2.1.0.min.js',
        'js/map/before.load.js',
        'js/map/jquery-migrate-1.2.1.min.js',
        //   'js/map/markerclusterer.js',
        'js/global/bootstrap.min.js',
        'js/map/bootstrap-select.min.js',
        //  'js/map/icheck.min.js',
        'js/map/jquery.mCustomScrollbar.concat.min.js',
        'js/map/jquery.nouislider.all.min.js',
        //   'js/map/richmarker-compiled.js',
        // 'js/map/smoothscroll.js',
        //'js/map/infobox.js',
        // 'js/map/maps.js',
        // 'js/map/custom.js',
        'js/leaflet/leaflet.js',
        'js/leaflet-measure.js',
        'js/leaflet/leaflet-raw-dem.min.js',
        'js/leaflet/leaflet.markercluster.js',
        'js/leaflet/esri-leaflet.js',
        'js/leaflet/leaflet-search.js',
        'js/ui-function.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}

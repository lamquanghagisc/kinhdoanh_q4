<?php
namespace app\widgets\maps;


use yii\web\AssetBundle;
use yii\web\View;


class LeafletMapAsset extends AssetBundle
{
    public $sourcePath = '@app/widgets/maps/assets';

    public $jsOptions = ['position' => View::POS_HEAD];
    public $css = [
        'css/leaflet.css',
        'css/prunecluster.css',
    ];

    public $js = [
        'js/leaflet-src.js',
        'js/proj4.js',
        'js/jquery.geocomplete.js',
        'js/PruneCluster.js',
        'js/leaflet.draw.js',
        'js/leaflet.measure.js',
    ];
//    public $css = [
//        'css/MarkerCluster.css',
//        'css/MarkerCluster.Default.css'
//    ];
//
    public $depends = [
        'app\modules\backend\assets\BackendAssets',
    ];

//    public $js = [
//        'https://unpkg.com/leaflet.markercluster@1.0.0/dist/leaflet.markercluster.js'
//    ];

//    public function init()
//    {
//        $this->sourcePath = __DIR__ . '/assets';
//        $this->js = YII_DEBUG ? ['js/leaflet.markercluster-src.js'] : ['js/leaflet.markercluster.js'];
//    }
}

<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/9/2021
 * Time: 2:33 PM
 */
use app\widgets\maps\types\LatLng;
use app\widgets\maps\controls\Scale;
use app\widgets\maps\layers\Marker;
use app\widgets\maps\layers\TileLayer;
use app\widgets\maps\controls\Layers;
//use \app\widgets\maps\LeafletMapAsset;
use app\widgets\maps\LeafletMap;
use app\services\MapService;
//
//LeafletMapAsset::register($this);

?>
11
<?php
$center = new LatLng(['lat' => isset($model->geo_y) ? $model->geo_y : 10.7974803, 'lng' => isset($model->geo_x) ? $model->geo_x : 106.6411483]);
$marker = new Marker(['latLng' => $center]);

$hcmgis_layer = new TileLayer([
    'urlTemplate' => 'https://maps.hcmgis.vn/geoserver/ows',
    'service' => TileLayer::WMS,
    'layerName' => 'HCMGIS',
    'clientOptions' => [
        'layers' => 'hcm_map:hcm_map_all'
    ],
]);

$leaflet = new LeafletMap([
    'center' => $center, // set the center
    'zoom' => 16
//                            'clientOptions' => ['height' => '305px',]
]);

$layers_control = new Layers();
$layers_control->setBaseLayers(MapService::createBaseMaps());
$leaflet->addControl($layers_control);

$scale_control = new Scale();
$leaflet->addControl($scale_control);
$leaflet->addLayer($hcmgis_layer);
$leaflet->addLayer($marker);

echo $leaflet->widget([
    'id' => 'map1',

    'styleOptions' => ['height' => '450px',
        'z-index' => '0'],
]);
?>

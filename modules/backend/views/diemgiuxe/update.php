<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

$urlMN = Url::to(['diemgiuxe/get']);
$this->title = 'Cập nhật Điểm giữ xe';
$this->params['breadcrumbs'][] = ['label' => 'Điểm giữ xe', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #geocomplete-wrapper {
        position: absolute;
        top: 10px;
        left: 70px;
        z-index: 1000;
        width: 500px;
    }
    #geocomplete { background-color: rgba(255,255,255,0.8); }

</style>

<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title text-uppercase">
                    <?= $this->title ?>
                </h3>
            </div>
            <div class="block-content padding-tb-05">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>

<div style="clear: both"></div>

<script>
    $(document).ready(function () {
       

    });
    var map;
    map = L.map('capnhatvitri').setView([<?= ($model['toado']->geo_y != null) ? $model['toado']->geo_y : 10.759610 ?>, <?= ($model['toado']->geo_x != null) ? $model['toado']->geo_x : 106.704339 ?>], 18);
    var marker = new L.marker([<?= ($model['toado']->geo_y != null) ? $model['toado']->geo_y : 10.759610 ?>, <?= ($model['toado']->geo_x != null) ? $model['toado']->geo_x : 106.704339 ?>], {draggable: 'true'});


    // OVERLAYS -----------------------------------------------------
    var layerOpenStreetMap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 22,
        maxNativeZoom: 22,
        attribution: '© OpenStreetMap contributors'
    });
    var layerHCMMap = L.tileLayer.wms('http://pcd.hcmgis.vn/geoserver/ows?', {
        layers: 'hcm_map:hcm_map'
    });
    var googlelayer = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 24,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    });
    var mapbox = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ#3/0.00/0.00', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        id: 'streets-v9',
        //  accessToken: 'pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ'
    });
   var ranhthua = L.tileLayer.wms('http://kinhdoanhq4.hcmgis.vn/geo113/dbkinhdoanh_q4/wms?', {
        layers: 'dbkinhdoanh_q4:ranh_thua',
        transparent: true,
        format: 'image/png8',
        maxZoom: 24,
        minZoom: 18,
    });
    var baseLayers = {
        "HCMGIS": layerHCMMap,
        "OpenStreetMap": layerOpenStreetMap,
        "Ảnh vệ tinh": googlelayer,
        "MapBox": mapbox,
     
    };

    var overLayers = {
        "Ranh thửa": ranhthua
        // 'Ranh nhà': gt_hcm,
        //'Ranh phường': layerRanhphuong.addTo(this.map),
        // 'Ranh quận': layerRanhquan,
        // 'Cần Giờ': layerCanGio,
    };
    $('#geocomplete')
            .geocomplete()
            .bind("geocode:result", function (event, result) {
                map.panTo([result.geometry.location.lat(), result.geometry.location.lng()]);
                marker.setLatLng(new L.LatLng(result.geometry.location.lat(), result.geometry.location.lng()), {draggable: 'true'});
                $('#geo_y').val(result.geometry.location.lat());
                $('#geo_x').val(result.geometry.location.lng());
                marker.addTo(map);
            });
    L.control.layers(baseLayers, overLayers).addTo(this.map);
    this.map.addLayer(mapbox, true);
    var x = 10.7840441;
    var y = 106.6939804;

    marker.on('dragend', function (event) {
        var marker = event.target;
        var position = marker.getLatLng();
        marker.setLatLng(new L.LatLng(position.lat, position.lng), {draggable: 'true'});
        map.panTo(new L.LatLng(position.lat, position.lng))
        $('#geo_y').val(position.lat);
        $('#geo_x').val(position.lng);
    });
    map.addLayer(marker);
    marker.bindPopup('<?= $model['diemgiuxe']->ten_diemgiuxe ?>');
</script>
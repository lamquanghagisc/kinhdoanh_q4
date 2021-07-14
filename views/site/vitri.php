<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 10/6/2017
 * Time: 4:50 PM
 */
use kartik\form\ActiveForm;
?>

<?php
$form = ActiveForm::begin([
            'id' => 'update-can'
        ])
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Vị trí bản đồ</h4>
</div>
<div class="modal-body">
    <div class="col-md-12 form-group" >
        <div id="capnhatvitri" style="height: 400px"></div>

    </div>
    <div class="col-md-12" class="form-group">
        <div class="col-md-6">
            <label>Kinh độ (Long)</label>
            <input class="form-control" type="text" name="ToaDo[geo_x]" id="geo_x" value="<?= $model['toado']->geo_x ?>">
        </div>
        <div class="col-md-6">
            <label>Vĩ độ (Lat)</label>
            <input class="form-control" type="text" name="ToaDo[geo_y]" id="geo_y" value="<?= $model['toado']->geo_y ?>">
        </div>
    </div>

    <div style="clear: both;"></div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Đóng</button>

</div>
<?php ActiveForm::end() ?>

<script>

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
    var baseLayers = {
        "HCMGIS": layerHCMMap,
        "OpenStreetMap": layerOpenStreetMap,
        "Ảnh vệ tinh": googlelayer,
        "MapBox": mapbox

    };

    var overLayers = {
        //  'Ranh tổ': layerRanhto.addTo(this.map),
        // 'Ranh nhà': gt_hcm,
        //'Ranh phường': layerRanhphuong.addTo(this.map),
        // 'Ranh quận': layerRanhquan,
        // 'Cần Giờ': layerCanGio,
    };

    L.control.layers(baseLayers, overLayers).addTo(this.map);
    this.map.addLayer(mapbox, true);
    var x = 10.759610;
    var y = 106.704339;

   
    map.addLayer(marker);

</script>

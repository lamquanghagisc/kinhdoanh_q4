<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

$urlMN = Url::to(['vanphong/get']);
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
    fieldset {
        padding: 1em;
        font:100%/1 sans-serif;
    }
</style>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('vanphong') ?>">Danh sách Văn phòng cho thuê</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Cập nhật Văn phòng cho thuê</span>
    </li>
</ul>

<?php
$form = ActiveForm::begin([
            'id' => 'update-vanphong',
            'options' => [
                'class' => 'skin skin-square',
                'enctype' => 'multipart/form-data'
            ]
        ])
?>


<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Cập nhật Văn phòng cho thuê</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="tabbable-line form-group">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>
                        <li><a data-toggle="tab" href="#vitri" onclick=" setTimeout(function () {
                                               map.invalidateSize()
                                           }, 200);">Vị trí không gian</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="thongtinchung">
                            <div class="col-sm-12">
                                <div class="col-sm-6" autofocus>
                                    <?= $form->field($model['vanphong'], 'ten_vanphong', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên văn phòng') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['vanphong'], 'chu_dau_tu')->textInput(['maxlength' => true])->label('Chủ đầu tư') ?>
                                </div>
                            </div>

                            <div class="col-sm-12">

                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'))->label('Tên phường') ?>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <?=
                                    $form->field($model['vanphong'], 'tien_phi')->widget(MaskedInput::className(), [
                                        'options' => [
                                            'class' => 'form-control'
                                        ],
                                        'clientOptions' => [
                                            'alias' => 'decimal',
                                            'groupSeparator' => '.',
                                            'radixPoint' => ',',
                                            'autoGroup' => true,
                                            'removeMaskOnSubmit' => true
                                        ],
                                    ])->label('Tiền phí')
                                    ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'dien_thoai')->textInput(['maxlength' => true])->label('Điện thoại') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'coquan_quanly')->textInput(['maxlength' => true])->label('Cơ quan quản lý') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'quy_mo')->textInput(['maxlength' => true])->label('Quy mô') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'tien_ich')->textInput(['maxlength' => true])->label('Tiện ích') ?>
                                </div>
                            </div>
                            <div style="clear: both"></div>

                        </div>
                        <div class="tab-pane" id="vitri">
                            <div class="col-md-12 form-group" >
                                <div id="capnhatvitri" style="height: 400px"></div>
                                <div id="geocomplete-wrapper">
                                    <input id="geocomplete" class="form-control" @keyup.enter="geoSearch" type="text" placeholder="Nhập vị trí tìm kiếm"/>
                                </div>
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

                            <div style="clear: both"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning pull-left">Cập nhật</button>
                    <a class="btn btn-danger pull-left"
                       href="<?= Yii::$app->urlManager->createUrl('vanphong/view') . '?id=' . $model['vanphong']['id_vanphong'] ?>">Huỷ</a>
                    <a href="<?= Yii::$app->urlManager->createUrl('vanphong') ?>"
                       class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
                </div>
                <div style="clear: both"></div>

            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

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
    marker.bindPopup('<?= $model['vanphong']->ten_vanphong ?>');
</script>
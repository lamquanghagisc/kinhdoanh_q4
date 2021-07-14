<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VChuyengia */
?>

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
        <span class="active">Chi tiết Văn phòng cho thuê</span>
    </li>
</ul>
<?php $create = Yii::$app->session->getFlash('hkd_create_success') ?>
<?php if (isset($create)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Thêm mới thành công!</div>
        </div>
    </div>
<?php endif; ?>
<?php $update = Yii::$app->session->getFlash('hkd_update_success') ?>
<?php if (isset($update)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Cập nhật thành công!</div>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Chi tiết Văn phòng cho thuê</span>
                </div>
                <div class="caption pull-right">
                    <a class="btn btn-warning pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('vanphong/update') . '?id=' . $model['vanphong']->id_vanphong ?>">Cập
                        nhật</a>
                    <a class="btn btn-info pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('vanphong/create') ?>">Thêm mới</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class=" tab-pane active" id="thongtinchung">
                            <div class="col-md-7 form-group" >
                                <?=
                                DetailView::widget([
                                    'model' => $model['vanphong'],
                                    'attributes' => [
                                        'ten_vanphong',
                                        [
                                            'label' => 'Địa chỉ',
                                            'value' => (($model['vanphong']->so_nha == NULL) ? '' : $model['vanphong']->so_nha . ', ') . (($model['vanphong']->ten_duong == NULL) ? '' : $model['vanphong']->ten_duong . ', ') . (($model['vanphong']->ten_phuong == NULL) ? '' : $model['vanphong']->ten_phuong),
                                        ],
                                       
                                        [
                                            'attribute' => 'tien_phi',
                                            'value' => number_format($model['vanphong']->tien_phi, 0, ',', ','),
                                        ],
                                        'chu_dau_tu',
                                        'coquan_quanly',
                                        'quy_mo',
                                        'tien_ich',
                                         'dien_thoai'
                                    ],
                                ])
                                ?>
                            </div>
                            <div class="col-md-5 form-group" >
                                <div id="capnhatvitri" style=" height: 650px;"></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

    </div>
    <div class="modal-footer">
        <a href="<?= Yii::$app->urlManager->createUrl('vanphong') ?>"
           class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        uiEventUpdate('#capnhatvitri ');
    });
    var map;
    map = L.map('capnhatvitri').setView([<?= ($model['vanphong']->geo_y != null) ? $model['vanphong']->geo_y : 10.7756587 ?>, <?= ($model['vanphong']->geo_x != null) ? $model['vanphong']->geo_x : 106.70042379999995 ?>], 18);
    var marker = new L.marker([<?= ($model['vanphong']->geo_y != null) ? $model['vanphong']->geo_y : 0 ?>, <?= ($model['vanphong']->geo_x != null) ? $model['vanphong']->geo_x : 0 ?>], {
        draggable: false
    })
            .addTo(map)


    // OVERLAYS -----------------------------------------------------
    var layerOpenStreetMap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 22,
        maxNativeZoom: 22,
        attribution: '© OpenStreetMap contributors'
    });
    var layerHCMMap = L.tileLayer.wms('http://maps.hcmgis.vn/geoserver/ows?', {
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
        //  "OpenStreetMap": layerOpenStreetMap,
        "Ảnh vệ tinh": googlelayer,
        "MapBox": mapbox

    };

    L.control.layers(baseLayers).addTo(this.map);
    this.map.addLayer(mapbox, true);

</script>
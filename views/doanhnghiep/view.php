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
        <a href="<?= Yii::$app->urlManager->createUrl('doanhnghiep') ?>">Danh sách Doanh nghiệp</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Chi tiết Doanh nghiệp</span>
    </li>
</ul>
<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Chi tiết Doanh nghiệp</span>
                </div>
                <div class="caption pull-right">
                    <a class="btn btn-warning pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('doanhnghiep/update') . '?id=' . $model['doanhnghiep']->id_doanhnghiep ?>">Cập
                        nhật</a>
                    <a class="btn btn-info pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('doanhnghiep/create') ?>">Thêm mới</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class=" tab-pane active" id="thongtinchung">
                            <div class="col-md-7 " >
                                <?=
                                DetailView::widget([
                                    'model' => $model['doanhnghiep'],
                                    'attributes' => [
                                        'ten_dn',
                                        [
                                            'label' => 'Địa chỉ',
                                            'value' => (($model['doanhnghiep']->so_nha == NULL) ? '' : $model['doanhnghiep']->so_nha . ', ') . (($model['doanhnghiep']->ten_duong == NULL) ? '' : $model['doanhnghiep']->ten_duong . ', ') . (($model['doanhnghiep']->ten_phuong == NULL) ? '' : $model['doanhnghiep']->ten_phuong ),
                                        ],
                                        'ten_loai',
                                        'so_giayphep',
                                        [
                                            'attribute' => 'ngaycap_giayphep',
                                            'format' => ['date', 'php:d-m-Y'],
                                        ],
                                        [
                                            'attribute' => 'ngay_thaydoi',
                                            'format' => ['date', 'php:d-m-Y'],
                                        ],
                                        'ma_nganh',
                                        'nganh_kd',
                                        'nguoi_daidien',
                                        [
                                            'label' => 'Giới Tính',
                                            'value' => ($model['doanhnghiep']->gioi_tinh == null) ? '' : (($model['doanhnghiep']->gioi_tinh == 1) ? 'Nam' : 'Nữ'),
                                        ],
                                        [
                                            'attribute' => 'ngay_sinh',
                                            'format' => ['date', 'php:d-m-Y'],
                                        ],
                                        'so_cmnd',
                                        'thanh_vien',
                                        'so_laodong',
                                        [
                                            'attribute' => 'von_dieule',
                                            'value' => number_format($model['doanhnghiep']->von_dieule, 0, ',', ','),
                                        ],
                                        'quanly_thue',
                                        'loaihinh_kinhte',
                                        'dien_thoai',
                                        'tinhtrang_hd'
                                    ],
                                ])
                                ?>
                            </div>
                            <div class="col-md-5" >
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
        <a href="<?= Yii::$app->urlManager->createUrl('doanhnghiep') ?>"
           class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        uiEventUpdate('#capnhatvitri ');
    });
    var map;
    map = L.map('capnhatvitri').setView([<?= ($model['doanhnghiep']->geo_y != null) ? $model['doanhnghiep']->geo_y : 10.7756587 ?>, <?= ($model['doanhnghiep']->geo_x != null) ? $model['doanhnghiep']->geo_x : 106.70042379999995 ?>], 18);
    var marker = new L.marker([<?= ($model['doanhnghiep']->geo_y != null) ? $model['doanhnghiep']->geo_y : 10.7756587 ?>, <?= ($model['doanhnghiep']->geo_x != null) ? $model['doanhnghiep']->geo_x : 106.70042379999995 ?>], {
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
<?php

use app\services\MapService;
use app\widgets\maps\controls\Layers;
use app\widgets\maps\controls\Scale;
use app\widgets\maps\layers\Marker;
use app\widgets\maps\layers\TileLayer;
use app\widgets\maps\LeafletMap;
use app\widgets\maps\LeafletMapAsset;
use app\widgets\maps\types\LatLng;
use yii\web\View;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model app\models\VChuyengia */
LeafletMapAsset::register($this);


$this->title = 'Chi tiết Doanh nghiệp';
$this->params['breadcrumbs'][] = ['label' => 'Doanh nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title text-uppercase">
                    <?= $this->title ?>
                </h3>
                <div class="block-options">
                    <a class="btn btn-warning"
                       href="<?= Yii::$app->urlManager->createUrl(['admin/doanhnghiep/update', 'id' => $model['doanhnghiep']->id_doanhnghiep]) ?>">Cập
                        nhật</a>
                    <a class="btn btn-success"
                       href="<?= Yii::$app->urlManager->createUrl(['admin/doanhnghiep/create']) ?>">Thêm mới</a>
                </div>
            </div>
             <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#thongtinchung">Thông tin chung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#thongtinvipham">Thông tin vi phạm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#vitri" id="vitritab">Vị trí</a>
                </li>
            </ul>
            <div class="block-content tab-content padding-tb-05">
                <div class="tab-pane active" role="tabpanel" id="thongtinchung">
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
                <div class="tab-pane" role="tabpanel" id="vitri">
                    <?php
                    $center = new LatLng(['lat' => isset($model['doanhnghiep']->geo_y) ? $model['doanhnghiep']->geo_y : 10.761101, 'lng' => isset($model['doanhnghiep']->geo_x) ? $model['doanhnghiep']->geo_x : 106.705054]);
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
                        'styleOptions' => ['height' => '550px',
                            'z-index' => '0'],
                    ]);
                    ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?= Yii::$app->urlManager->createUrl(['admin/doanhnghiep/index']) ?>"
                           class="btn btn-light float-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php

use yii\widgets\DetailView;
use kartik\tabs\TabsX;
use yii\helpers\Url;

use app\widgets\maps\types\LatLng;
use app\widgets\maps\controls\Scale;
use app\widgets\maps\layers\Marker;
use app\widgets\maps\layers\TileLayer;
use app\widgets\maps\controls\Layers;
use \app\widgets\maps\LeafletMapAsset;
use app\widgets\maps\LeafletMap;
use app\services\MapService;

LeafletMapAsset::register($this);


$this->title = 'Chi tiết Hộ kinh doanh';
$this->params['breadcrumbs'][] = ['label' => 'Hộ kinh doanh', 'url' => ['index']];
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
                       href="<?= Yii::$app->urlManager->createUrl(['admin/hokinhdoanh/update', 'id' => $model['hokinhdoanh']->id_hkd]) ?>">Cập
                        nhật</a>
                    <a class="btn btn-success"
                       href="<?= Yii::$app->urlManager->createUrl(['admin/hokinhdoanh/create']) ?>">Thêm mới</a>
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
                        'options' => ['class' => 'table table-bordered table-td-padding-015'],
                        'model' => $model['hokinhdoanh'],
                        'attributes' => [
                            'ten_hkd',
                            [
                                'label' => 'Địa diểm kinh doanh',
                                'value' => (($model['hokinhdoanh']->vi_tri == NULL) ? '' : $model['hokinhdoanh']->vi_tri . ', ') . (($model['hokinhdoanh']->so_nha == NULL) ? '' : $model['hokinhdoanh']->so_nha . ', ') . (($model['hokinhdoanh']->ten_duong == NULL) ? '' : $model['hokinhdoanh']->ten_duong . ', ') . (($model['hokinhdoanh']->ten_phuong == NULL) ? '' : $model['hokinhdoanh']->ten_phuong),
                            ],
                            'ma_nganh',
                            'ten_linhvuc',
                            'so_giayphep',
                            [
                                'attribute' => 'ngaycap_giayphep',
                                'format' => ['date', 'php:d-m-Y'],
                            ],
                            'dien_thoai',
                            'nganh_kd',
                            [
                                'attribute' => 'von_kd',
                                'value' => number_format($model['hokinhdoanh']->von_kd, 0, ',', ','),
                            ],
                            'nguoi_daidien',
                            [                      // the owner name of the model
                                'attribute' => 'ngay_sinh',
                                'format' => ['date', 'php:d-m-Y'],
                                //  'value' => date('d-m-Y', strtotime($model->ngay_sinh)),
                            ],
                            'dan_toc',
                            'quoc_tich',
                            'so_cmnd',
                            [                      // the owner name of the model
                                'attribute' => 'ngay_cap',
                                'format' => ['date', 'php:d-m-Y'],
                                //  'value' => date('d-m-Y', strtotime($model->ngay_cap)),
                            ],
                            'noi_cap',
                            [
                                'label' => 'Giới Tính',
                                'value' => ($model['hokinhdoanh']->gioi_tinh == null) ? '' : (($model['hokinhdoanh']->gioi_tinh == 1) ? 'Nam' : 'Nữ'),
                            ],
                            'hokhau_thuongtru',
                            'noisong_hientai',
                            'tinhtrang_hd'
                        ],
                    ])
                    ?>
                </div>
                <div class="tab-pane" role="tabpanel" id="thongtinvipham">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>STT</th>
                            <th>Số biên bản</th>
                            <th>Ngày lập</th>
                            <th>Đơn vị lập</th>
                            <th>Nội dung vi phạm</th>
                            <th>Số quyết định</th>
                            <th>Ngày quyết định</th>
                            <th>Đơn vị ra QĐ</th>
                            <th>Hình phạt</th>

                            <th></th>
                        </tr>
                        <?php if (isset($model['vipham']) && $model['vipham'] != null): ?>
                        <?php foreach ($model['vipham'] as $i => $vipham): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= ($vipham['bienban_so'] != null) ? $vipham['bienban_so'] : '' ?></td>
                            <td><?= ($vipham['ngay_lap'] != null) ? date('d-m-Y', strtotime($vipham['ngay_lap'])) : '' ?></td>
                            <td><?= ($vipham['donvi_lap'] != null) ? $vipham['donvi_lap'] : '' ?></td>
                            <td><?= ($vipham['noidung_vipham'] != null) ? $vipham['noidung_vipham'] : '' ?></td>
                            <td><?= ($vipham['quyetdinh_so'] != null) ? $vipham['quyetdinh_so'] : '' ?></td>
                            <td><?= ($vipham['quyetdinh_ngay'] != null) ? date('d-m-Y', strtotime($vipham['quyetdinh_ngay'])) : '' ?></td>
                            <td><?= ($vipham['donvi_qd'] != null) ? $vipham['donvi_qd'] : '' ?></td>
                            <td><?= ($vipham['hinhthuc_phat'] != null) ? $vipham['hinhthuc_phat'] : '' ?></td>

                            <?php endforeach; ?>
                            <?php endif ?>
                    </table>
                </div>
                <div class="tab-pane" role="tabpanel" id="vitri">
                    <?php
                    $center = new LatLng(['lat' => isset($model['hokinhdoanh']->geo_y) ? $model['hokinhdoanh']->geo_y : 10.761101, 'lng' => isset($model['hokinhdoanh']->geo_x) ? $model['hokinhdoanh']->geo_x : 106.705054]);
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
                        'zoom' => 20
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
                     <a href="<?= Yii::$app->urlManager->createUrl(['admin/hokinhdoanh/index']) ?>"
                           class="btn btn-light float-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
    $(document).ready(function () {
        $('#vitritab').tabs('load', 0);
    });
    // $('#vitritab').tabs('load', 0);
</script>
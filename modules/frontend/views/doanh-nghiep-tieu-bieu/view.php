<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/7/2021
 * Time: 4:25 PM
 */
use app\widgets\maps\types\LatLng;
use app\widgets\maps\controls\Scale;
use app\widgets\maps\layers\Marker;
use app\widgets\maps\layers\TileLayer;
use app\widgets\maps\controls\Layers;

use app\widgets\maps\LeafletMap;
use app\services\MapService;
use \app\widgets\maps\LeafletMapAsset;
LeafletMapAsset::register($this);

$this->title = $model->ten_dn;
$this->params['breadcrumbs'][] = ['label' => 'Doanh nghiệp tiêu biểu', 'url' => Yii::$app->urlManager->createUrl('doanh-nghiep-tieu-bieu/1')];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content content-full padding-t-0">
    <div class="block">
        <div class="block-content">
            <h2><?= $model->ten_dn?></h2>
            <table class="table table-bordered">
                <tr>
                    <th>Số giấy phép</th>
                    <td><?= $model->so_giayphep?></td>
                </tr>
                <tr>
                    <th>Ngày cấp phép</th>
                    <td><?= date('d-m-Y', strtotime($model->ngaycap_giayphep)) ?></td>
                </tr>
                <tr>
                    <th>Ngành kinh doanh</th>
                    <td><?= $model->nganh_kd?></td>
                </tr>
                <tr>
                    <th>Người đại diện</th>
                    <td><?= $model->nguoi_daidien?></td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td><?= $model->so_nha . ' ' . $model->ten_duong . ', '. $model->ten_phuong . ', Quận 4'?></td>
                </tr>
                <tr>
                    <th>Điện thoại</th>
                    <td><?= $model->dien_thoai?></td>
                </tr>
            </table>
            <div class="form-group">
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
            </div>

        </div>
    </div>
</div>

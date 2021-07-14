<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 7/8/2020
 * Time: 5:14 PM
 */

namespace app\services;

use app\widgets\maps\layers\TileLayer;
use app\widgets\maps\layers\LayerGroup;

class MapService
{
    public static function createBaseMaps()
    {
        $hcmgis_layer = new TileLayer([
            'urlTemplate' => 'http://maps.hcmgis.vn/geoserver/ows',
            'service' => TileLayer::WMS,
            'layerName' => 'HCMGIS',
            'clientOptions' => [
                'layers' => 'hcm_map:hcm_map_all'
            ],
        ]);

        $osm_layer = new TileLayer([
            'urlTemplate' => 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            'layerName' => 'OSM',
            'clientOptions' => [
                'attribution' => '© OpenStreetMap contributors',
                'maxZoom' => 22,
            ],
        ]);

        $google_layer = new TileLayer([
            'urlTemplate' => 'http://{s}.google.com/vt/lyrs=r&x={x}&y={y}&z={z}',
            'layerName' => 'GMAP',
            'clientOptions' => [
                'attribution' => '© GoogleMap contributors',
                'maxZoom' => 22,
                'subdomains' => ['mt0', 'mt1', 'mt2', 'mt3']
            ],
        ]);

        return [$hcmgis_layer, $osm_layer, $google_layer];
    }

    public static function createOverlays()
    {
        $overlays = [];

        $ranhthua_tanbinh = new TileLayer([
            'urlTemplate' => 'http://nhknhabe.hcmgis.vn/geo113/dbquanlynha_tanbinh/wms?',
            'service' => TileLayer::WMS,
            'layerName' => 'Tân Bình',
            'clientOptions' => [
                'layers' => 'dbquanlynha_tanbinh:ranh_thua',
                'transparent' => true,
                'format' => 'image/png8',
                'maxZoom' => 22,
            ],
        ]);

        $layerTanBinh = new LayerGroup();
        $layerTanBinh->addLayer($ranhthua_tanbinh);

        array_push($overlays, $layerTanBinh);

        return $overlays;
    }
}
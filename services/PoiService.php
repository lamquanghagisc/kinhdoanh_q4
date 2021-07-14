<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

class PoiService {

    public static $ARRAY_POI = [

        'v_hokinhdoanh' => 'Hộ kinh doanh',
        'v_doanhnghiep' => 'Doanh nghiệp',
        'diem_giu_xe' => 'Điểm giữ xe',
        'poi_ubnd' => 'Cơ quan nhà nước',
        'poi_coso_giaoduc' => 'Cơ sở giáo dục',
        'poi_coso_tongiao' => 'Cơ sở tôn giáo',
        'poi_coso_yte' => 'Cơ sở y tế',
        'poi_congan' => 'Công an',
        'poi_ditich' => 'Di tích',
        'poi_cho' => 'Chợ',
    ];
    public static $ARRAY_THUOCLA = [
        'v_hokinhdoanh' => 'Hộ kinh doanh thuốc lá',
        'poi_coso_giaoduc' => 'Cơ sở giáo dục',
        'poi_coso_yte' => 'Cơ sở y tế',
    ];
    public static $ARRAY_DIENTU = [
        'v_hokinhdoanh' => 'Hộ kinh doanh điện tử',
        'poi_coso_giaoduc' => 'Cơ sở giáo dục',
    ];
    public static $ARRAY_VUTRUONG = [
        'v_hokinhdoanh' => 'Hộ kinh doanh vũ trường',
        'diem_giu_xe' => 'Điểm giữ xe',
        'poi_coso_giaoduc' => 'Cơ sở giáo dục',
        'poi_coso_tongiao' => 'Cơ sở tôn giáo',
        'poi_coso_yte' => 'Cơ sở y tế',
        'poi_ditich' => 'Di tích',
    ];

}

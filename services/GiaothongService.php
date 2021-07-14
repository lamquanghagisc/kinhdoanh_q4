<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\models\GiaoThong;
use yii\data\Pagination;
use function mb_strtoupper;

/**
 * Description of GiaothongService
 *
 * @author TriLVH
 */
class GiaothongService {

    public static function getListHoKinhdoanhGeojson() {
        $listGiaothong = VGiaothong::find();
        $listGiaothong->where('geo_x is not null and geo_y is not null ');
        return $listGiaothong->select(['id_hkd as id', 'geo_x', 'geo_y', 'loaicuahang_id'])->asArray()->all();
    }

    public static function getFilterHoKinhdoanhGeojson($q = null) {
        $query = VGiaothong::find();
        if ($q != null) {
            $query->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($q)])
                    ->andFilterWhere(['like', 'upper(ten_linhvuc)', mb_strtoupper($t)]);
        }
        if ($t != null) {
            $query->andFilterWhere(['like', 'upper(ten_linhvuc)', mb_strtoupper($t)])
                    ->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($q)]);
        }

        return $query->select(['id_hkd as id', 'geo_x', 'geo_y', 'loaicuahang_id'])->asArray()->all();
    }

    public static function getGiaothong($slug) {
        $model = VGiaothong::find()->where(['id_hkd' => $slug])->asArray()->one();
        return $model;
    }

  

}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\models\VanPhong;
use app\models\VVanphong;
use yii\data\Pagination;
use function mb_strtoupper;

/**
 * Description of VanphongService
 *
 * @author TriLVH
 */
class VanphongService {

    public static function getListVanphongGeojson() {
        $listVanphong = VanPhong::find();
        $listVanphong->where('geom is not null');
        return $listVanphong->select(['id_vanphong as id', 'st_x(geom) AS geo_x', 'st_y(geom) AS geo_y'])->asArray()->all();
    }

    public static function getVanphong($slug) {
        $model = VVanphong::find()->where(['id_vanphong' => $slug])->asArray()->one();
        return $model;
    }

    public static function getListVanphong($q = null) {
        $query = VanPhong::find();
        if ($q != null) {
            $q = mb_strtoupper($q, 'UTF-8');
            $query->orWhere(['like', 'upper(ten_vanphong)', $q]);
            $query->orWhere(['like', 'upper(chu_dau_tu)', $q]);
            $query->orWhere(['like', 'upper(so_nha)', $q]);
            $query->orWhere(['like', 'upper(ten_duong)', $q]);
            $query->orWhere(['like', 'upper(ten_phuong)', $q]);
            $query->orWhere(['like', 'upper(dien_thoai)', $q]);
        }
        $countQuery = clone $query;
        $totalcount = $countQuery->count();
        $pages = new Pagination(['totalCount' => $totalcount]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        return ['pages' => $pages, 'models' => $models, 'totalcount' => $totalcount];
    }

}

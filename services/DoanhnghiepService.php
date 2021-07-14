<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\models\VDoanhnghiep;
use yii\data\Pagination;
use function mb_strtoupper;

/**
 * Description of DoanhnghiepService
 *
 * @author TriLVH
 */
class DoanhnghiepService {

    public static function getListDoanhnghiepGeojson() {
        $listDoanhnghiep = VDoanhnghiep::find();
        $listDoanhnghiep->where('geo_x is not null and geo_y is not null');
        return $listDoanhnghiep->select(['id_doanhnghiep as id', 'geo_x', 'geo_y', 'nganh_kd'])->asArray()->all();
    }

    public static function getDoanhnghiep($slug) {
        $model = VDoanhnghiep::find()->where(['id_doanhnghiep' => $slug])->asArray()->one();
        return $model;
    }

    public static function getFilterDoanhnghiepGeojson($q = null, $t = null) {
        $query = VDoanhnghiep::find();
        if ($q != null) {
            $query->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($q)])
                    ->andFilterWhere(['like', 'upper(ten_linhvuc)', mb_strtoupper($t)]);
        }
        if ($t != null) {
            $query->andFilterWhere(['like', 'upper(ten_linhvuc)', mb_strtoupper($t)])
                    ->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($q)]);
        }

        return $query->select(['id_doanhnghiep as id', 'geo_x', 'geo_y', 'loaihinhdn_id'])->asArray()->all();
    }

    public static function getListDoanhnghiep($q = null, $t = null) {
        $query = VDoanhnghiep::find();
        if ($q != null) {
            $query->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($q)])
                    ->andFilterWhere(['like', 'upper(ten_linhvuc)', mb_strtoupper($t)]);
        }
        if ($t != null) {
            $query->andFilterWhere(['like', 'upper(ten_linhvuc)', mb_strtoupper($t)])
                    ->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($q)]);
        }
        $countQuery = clone $query;
        $totalcount = $countQuery->count();
        $pages = new Pagination(['totalCount' => $totalcount]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        return ['pages' => $pages, 'models' => $models, 'totalcount' => $totalcount];
    }

    public static function getSearchDoanhnghiep($q = null) {
        $query = VDoanhnghiep::find();
        if ($q != null) {
            $q = mb_strtoupper($q, 'UTF-8');
            $query->orWhere(['like', 'upper(ten_dn)', $q]);
            $query->orWhere(['like', 'upper(ten_linhvuc)', $q]);
            $query->orWhere(['like', 'upper(so_nha)', $q]);
            $query->orWhere(['like', 'upper(ten_duong)', $q]);
            $query->orWhere(['like', 'upper(ten_loaihinh)', $q]);
        }
        $countQuery = clone $query;
        $totalcount = $countQuery->count();
        $pages = new Pagination(['totalCount' => $totalcount]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        return ['pages' => $pages, 'models' => $models, 'totalcount' => $totalcount];
    }

}

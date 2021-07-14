<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "van_phong".
 *
 * @property integer $id_vanphong
 * @property string $ten_vanphong
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $tien_phi
 * @property string $coquan_quanly
 * @property string $geom
 * @property string $ghi_chu
 * @property string $chu_dau_tu
 * @property integer $dien_tich
 * @property string $quy_mo
 * @property string $tien_ich
 * @property string $dien_thoai
 */
class VanPhong extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'van_phong';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ten_vanphong', 'so_nha', 'ten_duong', 'ten_phuong', 'coquan_quanly', 'geom', 'ghi_chu', 'chu_dau_tu', 'quy_mo', 'tien_ich', 'dien_thoai'], 'string'],
            [['tien_phi'], 'number'],
            [['dien_tich'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_vanphong' => 'Id Vanphong',
            'ten_vanphong' => 'Tên',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'ten_phuong' => 'Tên phường',
            'tien_phi' => 'Tiền phí',
            'coquan_quanly' => 'Cơ quan quản lý',
            'geom' => 'Geom',
            'ghi_chu' => 'Ghi chú',
            'chu_dau_tu' => 'Chủ đầu tư',
            'dien_tich' => 'Diện tích',
            'quy_mo' => 'Quy mô',
            'tien_ich' => 'Tiện ích',
            'dien_thoai' => 'Điện thoại',
        ];
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ho_kinh_doanh".
 *
 * @property integer $id_hkd
 * @property string $ten_hkd
 * @property string $dien_thoai
 * @property string $fax
 * @property string $email
 * @property string $nganh_kd
 * @property string $website
 * @property string $von_kd
 * @property string $nguoi_daidien
 * @property string $dan_toc
 * @property string $ngay_sinh
 * @property integer $gioi_tinh
 * @property string $quoc_tich
 * @property string $so_cmnd
 * @property string $ngay_cap
 * @property string $noi_cap
 * @property string $hokhau_thuongtru
 * @property string $noisong_hientai
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $vi_tri
 * @property string $giayphep_so
 * @property string $geom
 * @property string $giayphep_ngay
 * @property string $ghi_chu
 * @property string $ma_thue
 * @property string $ma_nganh
 * @property string $nam_sinh
 * @property integer $loaicuahang_id
 * @property string $nam_hd
 * @property string $tinh_trang
 * @property string $tinhtrang_gp
 * @property string $kehoach_bienphap
 * @property string $doituong_didoi
 * @property string $dien_tich
 */
class HoKinhDoanh extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ho_kinh_doanh';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ten_hkd', 'dien_thoai', 'fax', 'email', 'nganh_kd', 'website', 'nguoi_daidien', 'dan_toc', 'quoc_tich', 'so_cmnd', 'noi_cap', 'hokhau_thuongtru', 'noisong_hientai', 'so_nha', 'ten_duong', 'ten_phuong', 'vi_tri', 'so_giayphep', 'geom', 'ghi_chu', 'ma_thue', 'so_laodong','tinhtrang_hd' ], 'string'],
            [['von_kd'], 'match', 'pattern' => '/^([0-9.,])+$/'],
            [['ngay_sinh', 'ngaycap_giayphep','ngay_cap' ], 'safe'],
            [['gioi_tinh', 'linhvuc_id'], 'integer'],
            [['ma_nganh'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_hkd' => 'Id Hkd',
            'ten_hkd' => 'Ten HKD',
            'dien_thoai' => 'Dien Thoai',
            'fax' => 'Fax',
            'email' => 'Email',
            'nganh_kd' => 'Nganh Kd',
            'website' => 'Website',
            'von_kd' => 'Von Kd',
            'nguoi_daidien' => 'Nguoi Daidien',
            'dan_toc' => 'Dan Toc',
            'ngay_sinh' => 'Ngay Sinh',
            'gioi_tinh' => 'Gioi Tinh',
            'quoc_tich' => 'Quoc Tich',
            'so_cmnd' => 'So Cmnd',
            'ngay_cap' => 'Ngay Cap',
            'noi_cap' => 'Noi Cap',
            'hokhau_thuongtru' => 'Hokhau Thuongtru',
            'noisong_hientai' => 'Noisong Hientai',
            'so_nha' => 'So Nha',
            'ten_duong' => 'Ten Duong',
            'ten_phuong' => 'Ten Phuong',
            'vi_tri' => 'Vi Tri',
            'so_giayphep' => 'So Giayphep',
            'geom' => 'Geom',
            'ngaycap_giayphep' => 'Ngaycap Giayphep',
            'ghi_chu' => 'Ghi Chu',
            'ma_thue' => 'Ma Thue',
            'ma_nganh' => 'Ma Nganh',
            'loaicuahang_id' => 'Loaicuahang ID',
            'so_laodong' => 'So Laodong',
            'linh_vuc' => 'Linh Vuc',
            'linhvuc_id' => 'Linhvuc ID',
             'tinhtrang_hd' => 'Tinhtrang hd',
        ];
    }

    public function beforeValidate() {
        $this->von_kd = str_replace(",", ".", $this->von_kd);
        return true;
    }

}

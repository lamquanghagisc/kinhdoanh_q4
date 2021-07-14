<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doanh_nghiep".
 *
 * @property integer $id_doanhnghiep
 * @property string $ten_dn
 * @property integer $loaihinhdn_id
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $von_dieule
 * @property string $dien_thoai
 * @property string $nguoi_daidien
 * @property string $nganh_kd
 * @property string $ngaycap_giayphep
 * @property string $ngay_thaydoi
 * @property string $so_laodong
 * @property string $geom
 * @property string $ma_nganh
 * @property string $ghi_chu
 * @property string $so_giayphep
 * @property string $tinhtrang_hd
 * @property string $tinhtrang_thue
 * @property string $phuong_rasoat
 * @property integer $linhvuc_id
 * @property integer $gioi_tinh
 * @property string $ngay_sinh
 * @property string $so_cmnd
 * @property string $dan_toc
 * @property string $quoc_tich
 * @property string $thanh_vien
 * @property string $quanly_thue
 * @property string $loaihinh_kinhte
 * @property string $ten_loaihinh
 * @property string $ngay_cap
 * @property string $noi_cap
 * @property boolean $tieu_bieu
 */
class DoanhNghiep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doanh_nghiep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten_dn', 'so_nha', 'ten_duong', 'dien_thoai', 'nguoi_daidien', 'nganh_kd', 'so_laodong', 'geom', 'ma_nganh', 'ghi_chu', 'so_giayphep', 'so_cmnd', 'dan_toc', 'quoc_tich', 'thanh_vien', 'quanly_thue', 'loaihinh_kinhte', 'ten_loaihinh', 'noi_cap'], 'string'],
            [['loaihinhdn_id', 'linhvuc_id', 'gioi_tinh'], 'integer'],
            [['von_dieule'], 'number'],
            [['ngaycap_giayphep', 'ngay_thaydoi', 'ngay_sinh', 'ngay_cap'], 'safe'],
            [['tieu_bieu'], 'boolean'],
            [['ten_phuong'], 'string', 'max' => 100],
            [['tinhtrang_hd', 'tinhtrang_thue', 'phuong_rasoat'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_doanhnghiep' => 'Id Doanhnghiep',
            'ten_dn' => 'Ten Dn',
            'loaihinhdn_id' => 'Loaihinhdn ID',
            'so_nha' => 'So Nha',
            'ten_duong' => 'Ten Duong',
            'ten_phuong' => 'Ten Phuong',
            'von_dieule' => 'Von Dieule',
            'dien_thoai' => 'Dien Thoai',
            'nguoi_daidien' => 'Nguoi Daidien',
            'nganh_kd' => 'Nganh Kd',
            'ngaycap_giayphep' => 'Ngaycap Giayphep',
            'ngay_thaydoi' => 'Ngay Thaydoi',
            'so_laodong' => 'So Laodong',
            'geom' => 'Geom',
            'ma_nganh' => 'Ma Nganh',
            'ghi_chu' => 'Ghi Chu',
            'so_giayphep' => 'So Giayphep',
            'tinhtrang_hd' => 'Tinhtrang Hd',
            'tinhtrang_thue' => 'Tinhtrang Thue',
            'phuong_rasoat' => 'Phuong Rasoat',
            'linhvuc_id' => 'Linhvuc ID',
            'gioi_tinh' => 'Gioi Tinh',
            'ngay_sinh' => 'Ngay Sinh',
            'so_cmnd' => 'So Cmnd',
            'dan_toc' => 'Dan Toc',
            'quoc_tich' => 'Quoc Tich',
            'thanh_vien' => 'Thanh Vien',
            'quanly_thue' => 'Quanly Thue',
            'loaihinh_kinhte' => 'Loaihinh Kinhte',
            'ten_loaihinh' => 'Ten Loaihinh',
            'ngay_cap' => 'Ngay Cap',
            'noi_cap' => 'Noi Cap',
            'tieu_bieu' => 'Tieu Bieu',
        ];
    }
}

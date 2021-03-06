<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_hokinhdoanh".
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
 * @property string $so_giayphep
 * @property string $geom
 * @property string $ngaycap_giayphep
 * @property string $ghi_chu
 * @property string $ma_thue
 * @property string $ma_nganh
 * @property integer $loaicuahang_id
 * @property string $so_laodong
 * @property string $linh_vuc
 * @property integer $linhvuc_id
 * @property string $ten_linhvuc
 * @property double $geo_x
 * @property double $geo_y
 */
class VHokinhdoanh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_hokinhdoanh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_hkd', 'gioi_tinh', 'loaicuahang_id', 'linhvuc_id'], 'integer'],
            [['ten_hkd', 'dien_thoai', 'fax', 'email', 'nganh_kd', 'website', 'nguoi_daidien', 'dan_toc', 'quoc_tich', 'so_cmnd', 'noi_cap', 'hokhau_thuongtru', 'noisong_hientai', 'so_nha', 'ten_duong', 'ten_phuong', 'vi_tri', 'so_giayphep', 'geom', 'ghi_chu', 'ma_thue', 'so_laodong', 'linh_vuc','tinhtrang_hd'], 'string'],
            [['von_kd', 'geo_x', 'geo_y'], 'number'],
            [['ngay_sinh', 'ngay_cap', 'ngaycap_giayphep'], 'safe'],
            [['ma_nganh'], 'string', 'max' => 100],
            [['ten_linhvuc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hkd' => 'Id Hkd',
            'ten_hkd' => 'T??n HKD',
            'dien_thoai' => '??i???n tho???i',
            'fax' => 'Fax',
            'email' => 'Email',
            'nganh_kd' => 'Ng??nh ngh???',
            'website' => 'Website',
            'von_kd' => 'V???n kinh doanh',
            'nguoi_daidien' => 'Ng?????i ?????i di???n',
            'dan_toc' => 'D??n t???c',
            'ngay_sinh' => 'Ng??y sinh',
            'gioi_tinh' => 'Gi???i t??nh',
            'quoc_tich' => 'Qu???c t???ch',
            'so_cmnd' => 'CMND',
            'ngay_cap' => 'Ng??y c???p',
            'noi_cap' => 'N??i c???p',
            'hokhau_thuongtru' => 'H??? kh???u th?????ng tr??',
            'noisong_hientai' => 'N??i s???ng hi???n t???i',
            'so_nha' => 'S??? nh??',
            'ten_duong' => 'T??n ???????ng',
            'ten_phuong' => 'Ph?????ng',
            'vi_tri' => 'V??? tr??',
            'so_giayphep' => 'S??? gi???y ph??p',
            'geom' => 'Geom',
            'ngaycap_giayphep' => 'Ng??y c???p gi???y ph??p ',
            'ghi_chu' => 'Ghi Chu',
            'ma_thue' => 'M?? s??? thu???',
            'ma_nganh' => 'M?? ng??nh',
            'loaicuahang_id' => 'Loaicuahang ID',
            'so_laodong' => 'S??? lao ?????ng',
            'linh_vuc' => 'L??nh v???c',
            'linhvuc_id' => 'Linhvuc ID',
            'ten_linhvuc' => 'L??nh v???c',
            'tinhtrang_hd' => 'T??nh tr???ng ho???t ?????ng',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
        ];
    }
     public static function primaryKey() {
        return ['id_hkd']; // TODO: Change the autogenerated stub
    }
}

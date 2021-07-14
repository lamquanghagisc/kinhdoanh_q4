<?php

namespace app\modules\backend\models;

use app\modules\backend\models\categories\SanPham;
use Yii;

/**
 * This is the model class for table "kho_san_pham".
 *
 * @property int $id
 * @property int $sanpham_id Sản phẩm
 * @property string $ngay_nhap_kho Ngày nhập kho
 * @property string $ngay_xuat_kho Ngày xuất kho
 * @property int $gia_mua_vnd Giá mua (VND)
 * @property int $gia_mua_aud Giá mua (AUD)
 * @property int $nguoi_nhap_kho Người nhập kho
 * @property string|null $ngay_het_han Ngày hết hạn
 * @property int|null $status
 *
 * @property DonhangSanpham[] $donhangSanphams
 * @property SanPham $sanpham
 */
class KhoSanPham extends \app\modules\backend\base\BaseModel
{
    const SCENARIO_IMPORT= 'import';
    const SCENARIO_EXPORT = 'export';
    const SCENARIO_DELETE = 'delete';
    const SCENARIO_UPDATE = 'update';

    public $so_luong;
    public $san_pham;
    public $hang_san_xuat;
    public $loai_san_pham;
    public $quy_cach;

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_IMPORT] = ['sanpham_id', 'ngay_nhap_kho','gia_mua_vnd','nguoi_nhap_kho','so_luong','san_pham','hang_san_xuat','loai_san_pham','quy_cach'];
        $scenarios[self::SCENARIO_UPDATE] = ['sanpham_id', 'ngay_nhap_kho','gia_mua_vnd','nguoi_nhap_kho'];
        $scenarios[self::SCENARIO_DELETE] = ['status'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kho_san_pham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ngay_nhap_kho', 'ngay_xuat_kho', 'gia_mua_vnd', 'gia_mua_aud', 'nguoi_nhap_kho'], 'required','message' => '"{attribute}" không được để trống!'],
            [['sanpham_id', 'nguoi_nhap_kho'], 'integer'],
            [['ngay_nhap_kho', 'ngay_xuat_kho', 'ngay_het_han'], 'safe'],
            [['sanpham_id'], 'exist', 'skipOnError' => true, 'targetClass' => SanPham::className(), 'targetAttribute' => ['sanpham_id' => 'id']],
            [['so_luong'], 'integer'],
            [['so_luong'], 'required','message' => '"{attribute}" không được để trống!'],
            [['san_pham','hang_san_xuat','loai_san_pham','quy_cach'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sanpham_id' => 'Sản phẩm',
            'san_pham' => 'Sản phẩm',
            'hang_san_xuat' => 'Hãng sản xuất',
            'loai_san_pham' => 'Loại sản phẩm',
            'ngay_nhap_kho' => 'Ngày nhập kho',
            'ngay_xuat_kho' => 'Ngày xuất kho',
            'gia_mua_vnd' => 'Giá mua (VND)',
            'gia_mua_aud' => 'Giá mua (AUD)',
            'nguoi_nhap_kho' => 'Người nhập kho',
            'ngay_het_han' => 'Ngày hết hạn',
            'status' => 'Status',
            'so_luong' => 'Số lượng',
            'quy_cach' => 'Quy cách',
        ];
    }

    /**
     * Gets query for [[DonhangSanphams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonhangSanphams()
    {
        return $this->hasMany(DonhangSanpham::className(), ['kho_id' => 'id']);
    }

    /**
     * Gets query for [[Sanpham]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSanpham()
    {
        return $this->hasOne(SanPham::className(), ['id' => 'sanpham_id']);
    }
}

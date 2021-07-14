<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "donhang_sanpham".
 *
 * @property int $id
 * @property int $donhang_id Đơn hàng
 * @property int $kho_id Sản phẩm
 * @property int|null $gia_ban Giá bán
 *
 * @property DonHang $donhang
 * @property KhoSanPham $kho
 */
class DonhangSanpham extends \app\modules\backend\base\BaseModel
{

    public $so_luong;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donhang_sanpham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donhang_id', 'kho_id'], 'required'],
            [['donhang_id', 'kho_id', 'gia_ban'], 'integer'],
            [['donhang_id'], 'exist', 'skipOnError' => true, 'targetClass' => DonHang::className(), 'targetAttribute' => ['donhang_id' => 'id']],
            [['kho_id'], 'exist', 'skipOnError' => true, 'targetClass' => KhoSanPham::className(), 'targetAttribute' => ['kho_id' => 'id']],
            ['so_luong', 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'donhang_id' => 'Đơn hàng',
            'kho_id' => 'Sản phẩm',
            'gia_ban' => 'Giá bán',
            'so_luong' => 'Số lượng',
        ];
    }

    /**
     * Gets query for [[Donhang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonhang()
    {
        return $this->hasOne(DonHang::className(), ['id' => 'donhang_id']);
    }

    /**
     * Gets query for [[Kho]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKho()
    {
        return $this->hasOne(KhoSanPham::className(), ['id' => 'kho_id']);
    }
}

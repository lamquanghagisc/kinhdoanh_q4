<?php

namespace app\modules\backend\models\categories;

use app\modules\backend\models\KhoSanPham;
use Yii;

/**
 * This is the model class for table "san_pham".
 *
 * @property int $id
 * @property string|null $ten Tên sản phẩm
 * @property string|null $ghi_chu Ghi chú
 * @property int $hangsanxuat_id Hãng sản xuất
 * @property int $loaisanpham_id Loại sản phẩm
 * @property int|null $status
 * @property string|null $quy_cach Quy cách
 * @property string|null $hangsanxuat_ten Hãng sản xuất
 * @property string|null $loaisanpham_ten Loại sản phẩm
 *
 * @property KhoSanPham[] $khoSanPhams
 * @property HangSanXuat $hangsanxuat
 * @property LoaiSanPham $loaisanpham
 */
class SanPham extends \app\modules\backend\base\CategoriesBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'san_pham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hangsanxuat_id', 'loaisanpham_id'], 'required'],
            [['hangsanxuat_id', 'loaisanpham_id', 'status'], 'integer'],
            [['ten', 'ghi_chu'], 'string', 'max' => 200],
            [['quy_cach', 'hangsanxuat_ten', 'loaisanpham_ten'], 'string', 'max' => 100],
            [['hangsanxuat_id'], 'exist', 'skipOnError' => true, 'targetClass' => HangSanXuat::className(), 'targetAttribute' => ['hangsanxuat_id' => 'id']],
            [['loaisanpham_id'], 'exist', 'skipOnError' => true, 'targetClass' => LoaiSanPham::className(), 'targetAttribute' => ['loaisanpham_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên sản phẩm',
            'ghi_chu' => 'Ghi chú',
            'hangsanxuat_id' => 'Hãng sản xuất',
            'loaisanpham_id' => 'Loại sản phẩm',
            'status' => 'Status',
            'quy_cach' => 'Quy cách',
            'hangsanxuat_ten' => 'Hãng sản xuất',
            'loaisanpham_ten' => 'Loại sản phẩm',
        ];
    }

    /**
     * Gets query for [[KhoSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKhoSanPhams()
    {
        return $this->hasMany(KhoSanPham::className(), ['sanpham_id' => 'id']);
    }

    /**
     * Gets query for [[Hangsanxuat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHangsanxuat()
    {
        return $this->hasOne(HangSanXuat::className(), ['id' => 'hangsanxuat_id']);
    }

    /**
     * Gets query for [[Loaisanpham]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoaisanpham()
    {
        return $this->hasOne(LoaiSanPham::className(), ['id' => 'loaisanpham_id']);
    }
}

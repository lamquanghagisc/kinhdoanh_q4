<?php

namespace app\modules\backend\models\categories;

use Yii;

/**
 * This is the model class for table "loai_san_pham".
 *
 * @property int $id
 * @property string|null $ten Tên
 * @property string|null $ghi_chu Ghi chú
 * @property int $nhomsanpham_id Nhóm sản phẩm
 * @property int|null $status
 *
 * @property NhomSanPham $nhomsanpham
 * @property SanPham[] $sanPhams
 */
class LoaiSanPham extends \app\modules\backend\base\CategoriesBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loai_san_pham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nhomsanpham_id'], 'required'],
            [['nhomsanpham_id', 'status'], 'integer'],
            [['ten', 'ghi_chu'], 'string', 'max' => 200],
            [['nhomsanpham_id'], 'exist', 'skipOnError' => true, 'targetClass' => NhomSanPham::className(), 'targetAttribute' => ['nhomsanpham_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên',
            'ghi_chu' => 'Ghi chú',
            'nhomsanpham_id' => 'Nhóm sản phẩm',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Nhomsanpham]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNhomsanpham()
    {
        return $this->hasOne(NhomSanPham::className(), ['id' => 'nhomsanpham_id']);
    }

    /**
     * Gets query for [[SanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSanPhams()
    {
        return $this->hasMany(SanPham::className(), ['loaisanpham_id' => 'id']);
    }
}

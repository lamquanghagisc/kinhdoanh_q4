<?php

namespace app\modules\backend\models\categories;

use Yii;

/**
 * This is the model class for table "nhom_san_pham".
 *
 * @property int $id
 * @property string|null $ten Tên
 * @property string|null $ghi_chu Ghi chú
 * @property int $status
 *
 * @property LoaiSanPham[] $loaiSanPhams
 */
class NhomSanPham extends \app\modules\backend\base\CategoriesBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nhom_san_pham';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['ten', 'ghi_chu'], 'string', 'max' => 200],
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
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[LoaiSanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoaiSanPhams()
    {
        return $this->hasMany(LoaiSanPham::className(), ['nhomsanpham_id' => 'id']);
    }
}

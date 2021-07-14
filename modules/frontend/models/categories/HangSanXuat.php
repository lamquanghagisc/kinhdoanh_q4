<?php

namespace app\modules\backend\models\categories;

use Yii;

/**
 * This is the model class for table "hang_san_xuat".
 *
 * @property int $id
 * @property string|null $ten Tên
 * @property string|null $ghi_chu Ghi chú
 * @property int|null $status
 *
 * @property SanPham[] $sanPhams
 */
class HangSanXuat extends \app\modules\backend\base\CategoriesBaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hang_san_xuat';
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
     * Gets query for [[SanPhams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSanPhams()
    {
        return $this->hasMany(SanPham::className(), ['hangsanxuat_id' => 'id']);
    }
}

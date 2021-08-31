<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "san_pham_view".
 *
 * @property int $id
 * @property int|null $sanpham_id
 */
class SanPhamView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'san_pham_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sanpham_id'], 'default', 'value' => null],
            [['sanpham_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sanpham_id' => 'Sanpham ID',
        ];
    }
}

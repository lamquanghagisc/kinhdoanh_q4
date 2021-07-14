<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "v_kho".
 *
 * @property int|null $id
 * @property string|null $sp Tên sản phẩm
 * @property string|null $lsp Tên
 * @property string|null $hsx Tên
 * @property int $so_luong
 * @property string|null $full_ten
 */
class VKho extends \app\modules\backend\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_kho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'so_luong'], 'integer'],
            [['full_ten'], 'string'],
            [['sp', 'lsp', 'hsx'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sp' => 'Tên sản phẩm',
            'lsp' => 'Tên',
            'hsx' => 'Tên',
            'so_luong' => 'So Luong',
            'full_ten' => 'Full Ten',
        ];
    }
}

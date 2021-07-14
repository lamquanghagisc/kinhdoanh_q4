<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_phuong_nn_dn".
 *
 * @property string $sl_doanhnghiep
 * @property string $ten_phuong
 * @property string $ten_linhvuc
 */
class TkPhuongNnDn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_phuong_nn_dn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sl_doanhnghiep'], 'integer'],
            [['ten_linhvuc'], 'string'],
            [['ten_phuong'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sl_doanhnghiep' => 'Sl Doanhnghiep',
            'ten_phuong' => 'Ten Phuong',
            'ten_linhvuc' => 'Ten Linhvuc',
        ];
    }
}

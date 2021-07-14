<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_dn_phuong".
 *
 * @property string $sl_doanhnghiep
 * @property string $ten_phuong
 */
class TkDnPhuong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_dn_phuong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sl_doanhnghiep'], 'integer'],
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
        ];
    }
}

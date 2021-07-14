<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_dn_nganhnghe".
 *
 * @property string $sl_doanhnghiep
 * @property integer $id_linhvuc
 * @property string $ten_linhvuc
 */
class TkDnNganhnghe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_dn_nganhnghe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sl_doanhnghiep', 'id_linhvuc'], 'integer'],
            [['ten_linhvuc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sl_doanhnghiep' => 'Sl Doanhnghiep',
            'id_linhvuc' => 'Id Linhvuc',
            'ten_linhvuc' => 'Ten Linhvuc',
        ];
    }
}

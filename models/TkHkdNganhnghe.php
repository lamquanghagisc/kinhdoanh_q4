<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_hkd_nganhnghe".
 *
 * @property string $sl_hokinhdoanh
 * @property integer $id_linhvuc
 * @property string $ten_linhvuc
 */
class TkHkdNganhnghe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_hkd_nganhnghe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sl_hokinhdoanh', 'id_linhvuc'], 'integer'],
            [['ten_linhvuc'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sl_hokinhdoanh' => 'Sl Hokinhdoanh',
            'id_linhvuc' => 'Id Nn',
            'ten_linhvuc' => 'Ten Nganh',
        ];
    }
}

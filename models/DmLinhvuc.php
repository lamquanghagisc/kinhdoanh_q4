<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_linhvuc".
 *
 * @property integer $id_linhvuc
 * @property string $ten_linhvuc
 * @property string $ghi_chu
 */
class DmLinhvuc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_linhvuc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ghi_chu'], 'string'],
            [['ten_linhvuc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_linhvuc' => 'Id Linhvuc',
            'ten_linhvuc' => 'Lĩnh vực',
            'ghi_chu' => 'Ghi chú',
        ];
    }
}

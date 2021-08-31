<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "su_kien_view".
 *
 * @property int $id
 * @property int|null $sukien_id
 */
class SuKienView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'su_kien_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sukien_id'], 'default', 'value' => null],
            [['sukien_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sukien_id' => 'Sukien ID',
        ];
    }
}

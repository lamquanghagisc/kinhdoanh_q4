<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tin_tuc_view".
 *
 * @property int $id
 * @property int|null $tintuc_id
 */
class TinTucView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tin_tuc_view';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tintuc_id'], 'default', 'value' => null],
            [['tintuc_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tintuc_id' => 'Tintuc ID',
        ];
    }
    public function getTintuc(){
        return $this->hasOne(TinTuc::className(),['id_tintuc'=>'tintuc_id']);
    }
}

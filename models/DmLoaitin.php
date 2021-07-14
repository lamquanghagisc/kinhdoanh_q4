<?php

namespace app\models;
use app\models\TinTuc;
use Yii;

/**
 * This is the model class for table "dm_loaitin".
 *
 * @property int $id
 * @property string|null $ten_loai
 * @property string|null $create_at
 * @property string|null $update_at
 */
class DmLoaitin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dm_loaitin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_loai'], 'string'],
            [['create_at', 'update_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_loai' => 'Ten Loai',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
    public function getTintuc(){
        return $this->hasMany(TinTuc::className(),['loaitin_id'=>'id_tintuc']);
    }
}

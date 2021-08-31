<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_nganhnghe".
 *
 * @property int $id
 * @property string|null $ten_nganh
 */
class DmNganhNghe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dm_nganhnghe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_nganh'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_nganh' => 'Ten Nganh',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NganhNgheQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NganhNgheQuery(get_called_class());
    }
    public function getSanpham(){
        return $this->hasMany(SanPham::className(),['nganhnghe_id'=>'id']);
    }
    public function getSukien(){
        return $this->hasMany(SuKien::className(),['nganhnghe_id'=>'id']);
    }
}

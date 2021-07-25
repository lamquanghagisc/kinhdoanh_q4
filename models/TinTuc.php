<?php

namespace app\models;

use app\common\models\Api;
use app\models\DmLoaitin;
use app\models\auth\Taikhoan;
use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "tin_tuc".
 *
 * @property int $id_tintuc
 * @property string|null $tieu_de Tiêu đề
 * @property string|null $duong_dan Đường dẫn
 * @property string|null $noi_dung Nội dung
 * @property string|null $thoi_gian_dang
 * @property string|null $tom_tat Tóm tắt
 * @property string|null $alias_title
 */
class TinTuc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tin_tuc';
    }
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['loaitin_id', 'taikhoan_id'], 'default', 'value' => null],
            [['loaitin_id', 'taikhoan_id'], 'integer'],
            [['tieu_de', 'duong_dan', 'noi_dung', 'tom_tat', 'alias_title'], 'string'],
            [['thoi_gian_dang'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tintuc' => 'Id Tintuc',
            'tieu_de' => 'Tiêu đề',
            'duong_dan' => 'Đường dẫn',
            'noi_dung' => 'Nội dung',
            'thoi_gian_dang' => 'Thời gian đăng',
            'tom_tat' => 'Tóm tắt',
            'alias_title' => 'Slug',
            'loaitin_id' =>'Loại tin',
            'taikhoan_id' =>'Tài khoản'
        ];
    }
    public function getDmloaitin(){
        return $this->hasOne(DmLoaitin::className(),['id'=>'loaitin_id']);
    }
    public function getTaikhoan(){
        return $this->hasOne(Taikhoan::className(),['id_taikhoan'=>'taikhoan_id']);
    }
    public static  function  get_Loaitin(){
        $cat = DmLoaitin::find()->all();
        $cat = ArrayHelper::map($cat, 'id', 'ten_loai');
        return $cat;
    }
    public function beforeSave($insert)
    {
        // $this->thoi_gian_dang=Api::convertDMYtoYMD($this->thoi_gian_dang);
        if($this->thoi_gian_dang !=null){
            $this->thoi_gian_dang=date('Y-m-d', strtotime($this->thoi_gian_dang));
        }
        return parent::beforeSave($insert);
    }
    
}

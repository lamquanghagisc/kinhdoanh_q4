<?php

namespace app\models;

use app\common\models\Api;
use app\models\DmLoaitin;
use app\models\auth\Taikhoan;
use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
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
 * @property string|null $ten_hinh Tên hình
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
            [['ten_hinh'],'file','extensions'=>'jpg,png,gif']
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
            'ten_hinh' =>'Tên hình',
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
    //khi người dùng upload file mới khi cập nhật tin
    // file cu: a
    //file mới: b
    //1.xóa a
    //2.update a=b => tên a đã bị thay thế trong csdl thì sẽ mất tên a =>
    // do đó phải lưu tên file cũ trong session để lấy ra xóa
    //3.upload b
    public function beforeSave($insert)
    {
        $file=UploadedFile::getInstance($this,'ten_hinh');
        if($file){//có upload file
            //2.update a=b => tên a đã bị thay thế trong csdl thì sẽ mất tên a =>
            // do đó phải lưu file cũ trong session để lấy ra xóa
            $this->ten_hinh=$file->name;
            if(!$insert){
                $tintuc=self::findOne($this->id_tintuc);
                // lấy file cũ lưu vào session
                Yii::$app->session->set('ten_hinh_cu',$tintuc->ten_hinh);
            }
        }
        else{// không upload file
            if($insert){//TH insert
                $this->ten_hinh=null;
            }
            else{// TH update
                $tintuc=self::findOne($this->id_tintuc);
                // lấy tên đã có gán cho tên mới
                $this->ten_hinh=$tintuc->ten_hinh;
            }
        }
        $this->taikhoan_id= Yii::$app->user->id;
        if($this->thoi_gian_dang !=null){
            $this->thoi_gian_dang=date('Y-m-d', strtotime($this->thoi_gian_dang));
        }
        return parent::beforeSave($insert);
    }
    public function afterSave($insert, $changedAttributes)
    {
        $file=UploadedFile::getInstance($this,'ten_hinh');
        if($file){
            //3.upload b
            $ten_file=$this->ten_hinh;
            $path=Yii::$app->basePath.'/uploads/file/hinhtintuc/'.$ten_file;
            $file->saveAs($path);
            //xóa file cũ
            //1.xóa a
            if(!$insert){
                $ten_hinh_cu=Yii::$app->session->get('ten_hinh_cu');
                if($ten_hinh_cu != null){
                    $path=Yii::$app->basePath . '/uploads/file/hinhtintuc/'.$ten_hinh_cu;
                    if(is_file($path)){
                        unlink($path);
                    }
                }
            }
        }
        return parent::afterSave($insert,$changedAttributes);
    }
    
}

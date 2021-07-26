<?php

namespace app\models;
use app\models\DmLoaitin;
use app\models\auth\Taikhoan;
use yii\helpers\ArrayHelper;
use Yii;
use app\common\models\Api;
use yii\web\UploadedFile;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string|null $tieu_de
 * @property string|null $tom_tat
 * @property string|null $alias_title
 * @property string|null $ten_video
 * @property int|null $loaitin_id
 * @property int|null $taikhoan_id
 * @property string|null $thoi_gian_dang
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['duong_dan','tieu_de', 'tom_tat', 'alias_title', 'ten_video'], 'string'],
            [['loaitin_id', 'taikhoan_id'], 'default', 'value' => null],
            [['loaitin_id', 'taikhoan_id'], 'integer'],
            [['thoi_gian_dang'], 'safe'],
            // [['ten_video'], 'required','message' => '"{attribute}" không được để trống!'],
            [['ten_video'],'file','extensions'=>'mp2,mpa,mpe,mpeg,mpg,mpv2,	mp4,mov,qt,lsf,	lsx,asf,
                                                    asr,asx,avi,movie,wmv,MTS,M2TS,TS'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tieu_de' => 'Tiêu đề',
            'tom_tat' => 'Tóm tắt',
            'alias_title' => 'Slug',
            'ten_video' => 'Video',
            'duong_dan' => 'Đường dẫn',
            'loaitin_id' => 'Loại tin',
            'taikhoan_id' => 'Tài khoản',
            'thoi_gian_dang' => 'Thời gian đăng',
        ];
    }

    /**
     * {@inheritdoc}
     * @return VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoQuery(get_called_class());
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
    //khi người dùng upload file mới
    // file cu: a
    //file mới: b
    //1.xóa a
    //2.update a=b => tên a đã bị thay thế trong csdl thì sẽ mất tên a =>
    // do đó phải lưu tên file cũ trong session để lấy ra xóa
    //3.upload b
    public function beforeSave($insert)
    {
        $file=UploadedFile::getInstance($this,'ten_video');
        if($file){//có upload file
            //2.update a=b => tên a đã bị thay thế trong csdl thì sẽ mất tên a =>
            // do đó phải lưu file cũ trong session để lấy ra xóa
            $this->ten_video=$file->name;
            if(!$insert){
                $video=self::findOne($this->id);
                // lấy file cũ lưu vào session
                Yii::$app->session->set('ten_video_cu',$video->ten_video);
            }
        }
        else{// không upload file
            if($insert){//TH insert
                $this->ten_video=null;
            }
            else{// TH update
                $video=self::findOne($this->id);
                // lấy tên đã có gán cho tên mới
                $this->ten_video=$video->ten_video;
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
        $file=UploadedFile::getInstance($this,'ten_video');
        if($file){
            //3.upload b
            $ten_file=$this->ten_video;
            $path=Yii::$app->basePath.'/uploads/file/video/'.$ten_file;
            $file->saveAs($path);
            //xóa file cũ
            //1.xóa a
            if(!$insert){
                $ten_video_cu=Yii::$app->session->get('ten_video_cu');
                if($ten_video_cu != null){
                    $path=Yii::$app->basePath . '/uploads/file/video/'.$ten_video_cu;
                    if(is_file($path)){
                        unlink($path);
                    }
                }
            }
        }
        return parent::afterSave($insert,$changedAttributes);
    }
    // public function beforeDelete()
    // {
    //     if($this->ten_video!= null)
    //     {
    //         $path=Yii::$app->basePath . '/uploads/file/video/'.$this->ten_video;
    //         // dd($path);
    //         if(is_file($path)){
    //             unlink($path);
    //         }
                
    //     }
    // }
    public function getVideoLink()
    {
        $link=Yii::$app->basePath . '/uploads/file/video/'.$this->ten_video;
        return $link;
    }
    
}

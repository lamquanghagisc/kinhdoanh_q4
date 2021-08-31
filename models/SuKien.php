<?php

namespace app\models;

use Yii;
use app\models\auth\Taikhoan;
use yii\web\UploadedFile;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "su_kien".
 *
 * @property int $id
 * @property string|null $ten_su_kien
 * @property string|null $tom_tat
 * @property string|null $mo_ta
 * @property string|null $slug
 * @property string|null $thoi_gian_dang
 * @property string|null $thoi_gian_bat_dau
 * @property string|null $thoi_gian_ket_thuc
 * @property string|null $anh_dai_dien
 * @property int|null $noi_bat
 * @property int|null $nganhnghe_id
 * @property int|null $taikhoan_id
 * @property string|null $dia_diem
 */
class SuKien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'su_kien';
    }
    public function behaviors()
    {
        return [
            'sluggable' =>[

                'class' => SluggableBehavior::class,
                'attribute' => 'ten_su_kien',
                // 'slugAttribute' => 'slug',
            ],
            
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten_su_kien', 'tom_tat', 'mo_ta', 'slug', 'anh_dai_dien', 'dia_diem'], 'string'],
            [['thoi_gian_dang', 'thoi_gian_bat_dau', 'thoi_gian_ket_thuc'], 'safe'],
            [['noi_bat', 'nganhnghe_id', 'taikhoan_id'], 'default', 'value' => null],
            [['noi_bat', 'nganhnghe_id', 'taikhoan_id'], 'integer'],
            [['anh_dai_dien'],'file','extensions'=>'jpg,png,gif'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_su_kien' => 'Tên sự kiện',
            'tom_tat' => 'Tóm tắt',
            'mo_ta' => 'Mô tả',
            'slug' => 'Slug',
            'thoi_gian_dang' => 'Thời gian đăng',
            'thoi_gian_bat_dau' => 'Thời gian bắt đầu',
            'thoi_gian_ket_thuc' => 'Thời gian kết thúc',
            'anh_dai_dien' => 'Ảnh đại diện',
            'noi_bat' => 'Nổi bật',
            'nganhnghe_id' => 'Ngành nghề',
            'taikhoan_id' => 'Người dùng',
            'dia_diem' => 'Địa điểm',
        ];
    }
    public function getViews(){
        return $this->hasMany(SuKienView::className(),['sukien_id'=>'id']);
    }
    /**
     * {@inheritdoc}
     * @return SuKienQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SuKienQuery(get_called_class());
    }
    public function getDmnganhnghe(){
        return $this->hasOne(DmNganhNghe::className(),['id'=>'nganhnghe_id']);
    }
    public function getTaikhoan(){
        return $this->hasOne(Taikhoan::className(),['id_taikhoan'=>'taikhoan_id']);
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
        $file=UploadedFile::getInstance($this,'anh_dai_dien');
        if($file){//có upload file
            //2.update a=b => tên a đã bị thay thế trong csdl thì sẽ mất tên a =>
            // do đó phải lưu file cũ trong session để lấy ra xóa
            $this->anh_dai_dien=$file->name;
            if(!$insert){
                $sukien=self::findOne($this->id);
                // lấy file cũ lưu vào session
                Yii::$app->session->set('anh_dai_dien_cu',$sukien->anh_dai_dien);
            }
        }
        else{// không upload file
            if($insert){//TH insert
                $this->anh_dai_dien='no-image.png';
            }
            else{// TH update
                $sukien=self::findOne($this->id);
                // lấy tên đã có gán cho tên mới
                $this->anh_dai_dien=$sukien->anh_dai_dien;
            }
        }
        $this->taikhoan_id= Yii::$app->user->id;
        if($this->thoi_gian_dang !=null){
            $this->thoi_gian_dang=date('Y-m-d H:i', strtotime($this->thoi_gian_dang));
        }
        if($this->thoi_gian_bat_dau !=null){
            $this->thoi_gian_bat_dau=date('Y-m-d H:i', strtotime($this->thoi_gian_bat_dau));
        }
        if($this->thoi_gian_ket_thuc !=null){
            $this->thoi_gian_ket_thuc=date('Y-m-d H:i', strtotime($this->thoi_gian_ket_thuc));
        }
        return parent::beforeSave($insert);
    }
    public function afterSave($insert, $changedAttributes)
    {
        $file=UploadedFile::getInstance($this,'anh_dai_dien');
        if($file){
            //3.upload b
            $ten_file=$this->anh_dai_dien;
            $path=Yii::$app->basePath.'/uploads/file/hinhsukien/'.$ten_file;
            $file->saveAs($path);
            //xóa file cũ
            //1.xóa a
            if(!$insert){
                $anh_dai_dien_cu=Yii::$app->session->get('anh_dai_dien_cu');
                if($anh_dai_dien_cu != null){
                    $path=Yii::$app->basePath . '/uploads/file/hinhsukien/'.$anh_dai_dien_cu;
                    if(is_file($path)){
                        unlink($path);
                    }
                }
            }
        }
        return parent::afterSave($insert,$changedAttributes);
    }
}

<?php

namespace app\models;

use app\models\auth\Taikhoan;
use Yii;
use yii\web\UploadedFile;
use yii\behaviors\SluggableBehavior;
/**
 * This is the model class for table "san_pham".
 *
 * @property int $id
 * @property string|null $ten_san_pham
 * @property string|null $slug
 * @property string|null $tom_tat
 * @property string|null $mo_ta
 * @property string|null $thoi_gian_dang
 * @property string|null $anh_dai_dien
 * @property int|null $noi_bat
 * @property string|null $thoi_gian_sua
 * @property int|null $nganhnghe_id
 * @property int|null $taikhoan_id
 * @property float|null $gia_san_pham
 * @property int|null $so_luong
 * @property int|null $nam_sx
 * @property string|null $hang_sx
 * @property string|null $model
 * @property string|null $xuat_xu
 * @property int|null $bao_hanh
 * @property string|null $thong_so_kt
 * @property string|null $tinh_nang_nb
 * @property string|null $dat_tieu_chuan
 */
class SanPham extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'san_pham';
    }
    public function behaviors()
    {
        return [
            'sluggable' =>[

                'class' => SluggableBehavior::class,
                'attribute' => 'ten_san_pham',
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
            [['ten_san_pham', 'slug', 'tom_tat', 'mo_ta', 'anh_dai_dien','hang_sx','model','xuat_xu','thong_so_kt','tinh_nang_nb','dat_tieu_chuan'], 'string'],
            [['thoi_gian_dang', 'thoi_gian_sua'], 'safe'],
            [['noi_bat', 'nganhnghe_id', 'taikhoan_id','so_luong','nam_sx','bao_hanh'], 'default', 'value' => null],
            [['noi_bat', 'nganhnghe_id', 'taikhoan_id','so_luong','nam_sx','bao_hanh'], 'integer'],
            [['anh_dai_dien'],'file','extensions'=>'jpg,png,gif'],
            [['gia_san_pham'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten_san_pham' => 'T??n s???n ph???m',
            'slug' => 'Slug',
            'tom_tat' => 'T??m t???t',
            'mo_ta' => 'M?? t??? chi ti???t',
            'thoi_gian_dang' => 'Th???i gian ????ng',
            'anh_dai_dien' => '???nh ?????i di???n',
            'noi_bat' => 'N???i b???t',
            'thoi_gian_sua' => 'Th???i gian s???a',
            'nganhnghe_id' => 'Ng??nh ngh???',
            'taikhoan_id' => 'Ng?????i d??ng',
            'gia_san_pham' => 'Gi??',
            'so_luong' => 'S??? l?????ng',
            'nam_sx' =>'N??m s???n xu???t',
            'hang_sx' =>'H??ng s???n xu???t',
            'model'=> 'Model',
            'xuat_xu' =>'Xu???t x???',
            'bao_hanh' =>'B???o h??nh',
            'thong_so_kt' =>'Th??ng s??? k??? thu???t',
            'tinh_nang_nb' =>'T??nh n??ng n???i b???t',
            'dat_tieu_chuan' =>'?????t ti??u chu???n chu???n'
        ];
    }

    /**
     * {@inheritdoc}
     * @return SanPhamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SanPhamQuery(get_called_class());
    }
    public function getDmnganhnghe(){
        return $this->hasOne(DmNganhNghe::className(),['id'=>'nganhnghe_id']);
    }
    public function getTaikhoan(){
        return $this->hasOne(Taikhoan::className(),['id_taikhoan'=>'taikhoan_id']);
    }
    public function getViews(){
        return $this->hasMany(SanPhamView::className(),['sanpham_id'=>'id']);
    }
    //khi ng?????i d??ng upload file m???i khi c???p nh???t tin
    // file cu: a
    //file m???i: b
    //1.x??a a
    //2.update a=b => t??n a ???? b??? thay th??? trong csdl th?? s??? m???t t??n a =>
    // do ???? ph???i l??u t??n file c?? trong session ????? l???y ra x??a
    //3.upload b
    public function beforeSave($insert)
    {
        $file=UploadedFile::getInstance($this,'anh_dai_dien');
        if($file){//c?? upload file
            //2.update a=b => t??n a ???? b??? thay th??? trong csdl th?? s??? m???t t??n a =>
            // do ???? ph???i l??u file c?? trong session ????? l???y ra x??a
            $this->anh_dai_dien=$file->name;
            if(!$insert){
                $sanpham=self::findOne($this->id);
                // l???y file c?? l??u v??o session
                Yii::$app->session->set('anh_dai_dien_cu',$sanpham->anh_dai_dien);
            }
        }
        else{// kh??ng upload file
            if($insert){//TH insert
                $this->anh_dai_dien='no-image.png';
            }
            else{// TH update
                $sanpham=self::findOne($this->id);
                // l???y t??n ???? c?? g??n cho t??n m???i
                $this->anh_dai_dien=$sanpham->anh_dai_dien;
            }
        }
        $this->taikhoan_id= Yii::$app->user->id;
        if($this->thoi_gian_dang !=null){
            $this->thoi_gian_dang=date('Y-m-d', strtotime($this->thoi_gian_dang));
        }
        if($this->thoi_gian_sua !=null){
            $this->thoi_gian_sua=date('Y-m-d', strtotime($this->thoi_gian_sua));
        }
        return parent::beforeSave($insert);
    }
    public function afterSave($insert, $changedAttributes)
    {
        $file=UploadedFile::getInstance($this,'anh_dai_dien');
        if($file){
            //3.upload b
            $ten_file=$this->anh_dai_dien;
            $path=Yii::$app->basePath.'/uploads/file/hinhsanpham/'.$ten_file;
            $file->saveAs($path);
            //x??a file c??
            //1.x??a a
            if(!$insert){
                $anh_dai_dien_cu=Yii::$app->session->get('anh_dai_dien_cu');
                if($anh_dai_dien_cu != null){
                    $path=Yii::$app->basePath . '/uploads/file/hinhsanpham/'.$anh_dai_dien_cu;
                    if(is_file($path)){
                        unlink($path);
                    }
                }
            }
        }
        return parent::afterSave($insert,$changedAttributes);
    }
}

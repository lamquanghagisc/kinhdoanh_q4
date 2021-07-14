<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 5/30/2021
 * Time: 11:15 AM
 */

namespace app\modules\backend\base;


use app\modules\backend\models\categories\HangSanXuat;
use app\modules\backend\models\categories\LoaiSanPham;
use app\modules\backend\models\categories\SanPham;
use app\services\DebugService;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    public $INACTIVE = 0;
    public $ACTIVE = 1;
    public $SOLD = 2;
    public $OTHER_GROUP_CATEGORIES = 99;

//    public function beforeValidate(){
//        $modelName = $this->formName();
//        if($modelName == 'KhoSanPham'){
//            $this->ngay_nhap_kho = date('Y-m-d', strtotime(str_replace('/','-',$this->ngay_nhap_kho)));
//        }
//        parent::beforeValidate();
//    }

    public function saveKhoSanPham()
    {
        $this->ngay_nhap_kho = date('Y-m-d', strtotime(str_replace('/', '-', $this->ngay_nhap_kho)));

        if($this->sanpham_id == ''){

            $sanpham = new SanPham();
            $hsx = HangSanXuat::findOne(['ten' => $this->hang_san_xuat]);
            if($hsx == null){
                $hsx = new HangSanXuat();
                $hsx->ten = $this->hang_san_xuat;
                $hsx->save();
            }
            $sanpham->hangsanxuat_id = $hsx->id;

            $loaisanpham = explode(' - ', $this->loai_san_pham);

            $lsp = LoaiSanPham::findOne(['ten' => $loaisanpham[0]]);
            if($lsp == null){
                $lsp = new LoaiSanPham();
                $lsp->ten = $this->loai_san_pham;
                $lsp->nhomsanpham_id = $this->OTHER_GROUP_CATEGORIES;
                $lsp->save();
            }
            $sanpham->loaisanpham_id = $lsp->id;

            $sanpham->quy_cach = $this->quy_cach;
            $sanpham->ten = $this->san_pham;
            $sanpham->status = $this->ACTIVE;
            $sanpham->hangsanxuat_ten = $this->hang_san_xuat;
            $sanpham->loaisanpham_ten = $this->loai_san_pham;

            if($sanpham->save()){
                $this->sanpham_id = $sanpham->id;
            } else {
                return false;
            }
        }

        $flag = false;

        $userID = (\Yii::$app->user->isGuest) ? 0 : \Yii::$app->user->id;

        if($this->isNewRecord){
            for ($i = 1; $i <= $this->so_luong; $i++) {
                $a = clone $this;
                $a->gia_mua_vnd = str_replace(',','', $a->gia_mua_vnd);
                $a->nguoi_nhap_kho = $userID;

                $flag = $a->save();
            }
        } else {
            $this->gia_mua_vnd = str_replace(',','', $this->gia_mua_vnd);
            $flag = $this->save();
        }


        return $flag;
    }

    public function saveDonHang(){
        $this->ngay_ban = date('Y-m-d', strtotime(str_replace('/', '-', $this->ngay_ban)));
        if($this->save()){
            return true;
        } else {
            return false;
        }

    }
}
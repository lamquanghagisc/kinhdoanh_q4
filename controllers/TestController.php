<?php

namespace app\controllers;

use app\models\HkdSyn;
use app\models\HoKinhDoanh;
use app\services\DebugService;
use app\services\UtilityService;
use Yii;
use yii\web\Controller;

/**
 * HochamController implements the CRUD actions for HocHam model.
 */
class TestController extends Controller {

    public function actionCreate() {

        if (Yii::$app->request->isGet) {
            $get = Yii::$app->request->get();
            $client = Yii::$app->siteApi;
            $params = array('PageSize' => 1000, 'PageInDex' => $get['pageindex']);
            $data = $client->__soapCall('CPKT_API_List_Ngung', array('parameters' => $params));
            // DebugService::dumpdie($data);
            $query = $this->decodeSoapData($data, 'CPKT_API_List_Ngung');
            // DebugService::dumpdie($query);
            foreach ($query as $insert) {
                $model = HoKinhDoanh::findOne($insert->CNID);
                if ($model == NULL) {
                    $model = new HoKinhDoanh();
                    $model->id_hkd = $insert->CNID;
                    $model->ten_hkd = $insert->BangHieu;
                    $model->dien_thoai = $insert->DienThoaiKD;
                    $model->fax = $insert->FaxKD;
                    $model->email = $insert->EmailKD;
                    $model->nganh_nghe = $insert->NoiDungKD;
                    $model->website = $insert->WebsiteKD;
                    $model->von_kd = $insert->VonKD;
                    $model->dai_dien = $insert->HoTen;
                    $model->dan_toc = $insert->DanTocID;
                    $model->ngay_sinh = $insert->NgaySinh;
                    $model->quoc_tich = 'Việt Nam';
                    $model->cmnd = $insert->SoCMND;
                    $model->ngay_cap = $insert->NgayCapCMND;
                    $model->noi_cap = $insert->NoiCapCMND;
                    $model->hokhau_thuongtru = $insert->DiaChiThuongTru;
                    $model->noisong_hientai = $insert->ChoOHienTai;
                    $model->so_nha = $insert->SoNhaKD;
                    $model->ten_duong = $insert->TenDuong;
                    $model->ten_phuong = $insert->TenPhuong;
                    $model->ten_quan = 'Quận 1';
                    $model->giayphep_so = $insert->SoGP;
                    $model->giayphep_ngay = $insert->NgayGP;
                    $model->ghi_chu = $insert->GhiChu;
                    $model->gioi_tinh = $insert->GioiTinh;
                    if ($insert->StatusCode_GP == 1) {
                        $model->tinh_trang = 'Đang hoạt động';
                    } else if ($insert->StatusCode_GP == 2) {
                        $model->tinh_trang = 'Tạm ngừng';
                    }
                    $model->ma_thue = $insert->MST;
                    if ($insert->StatusCode_GP == 2) {
                        $model->tu_ngay = $insert->NgayBDNgung;
                    }
                    $model->ma_thue = $insert->MST;
                    $model->isNewRecord = true;
                    $model->save();
                }
                if ($model != NULL) {
                    $model->ten_hkd = $insert->BangHieu;
                    $model->dien_thoai = $insert->DienThoaiKD;
                    $model->fax = $insert->FaxKD;
                    $model->email = $insert->EmailKD;
                    $model->nganh_nghe = $insert->NoiDungKD;
                    $model->website = $insert->WebsiteKD;
                    $model->von_kd = $insert->VonKD;
                    $model->dai_dien = $insert->HoTen;
                    $model->dan_toc = $insert->DanTocID;
                    $model->ngay_sinh = $insert->NgaySinh;
                    $model->quoc_tich = 'Việt Nam';
                    $model->cmnd = $insert->SoCMND;
                    $model->ngay_cap = $insert->NgayCapCMND;
                    $model->noi_cap = $insert->NoiCapCMND;
                    $model->hokhau_thuongtru = $insert->DiaChiThuongTru;
                    $model->noisong_hientai = $insert->ChoOHienTai;
                    $model->so_nha = $insert->SoNhaKD;
                    $model->ten_duong = $insert->TenDuong;
                    $model->ten_phuong = $insert->TenPhuong;
                    $model->ten_quan = 'Quận 1';
                    $model->giayphep_so = $insert->SoGP;
                    $model->giayphep_ngay = $insert->NgayGP;
                    $model->ghi_chu = $insert->GhiChu;
                    if ($insert->StatusCode_GP == 1) {
                        $model->tinh_trang = 'Đang hoạt động';
                    } else if ($insert->StatusCode_GP == 2) {
                        $model->tinh_trang = 'Tạm ngừng';
                    }
                    $model->ma_thue = $insert->MST;
                    if ($insert->StatusCode_GP == 2) {
                        $model->tu_ngay = $insert->NgayBDNgung;
                    }
                    $model->ma_thue = $insert->MST;

                    $model->save();
                   
                }
            }
            
           UtilityService::alert('hkd_create_success');
//            return $this->redirect(Yii::$app->urlManager->createUrl('hokinhdoanh'));
            return $query[0]->TotalRowCount;
           
        }
    }

    public function decodeSoapData($data, $name) {
        // $data = $client->$name();
        return json_decode($data->{$name . 'Result'});
    }

    public function actionIndex() {
        $model = null;
        return $this->render('test', [
            'model' => $model
        ]);
    }
}

<?php

namespace app\controllers;

use app\models\DoanhNghiep;
use app\models\HoKinhDoanh;
use app\models\TkDnNganhnghe;
use app\models\TkDnPhuong;
use app\models\TkHkdNganhnghe;
use app\models\TkHkdPhuong;
use app\models\TkPhuongNn;
use app\models\TkPhuongNnDn;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * HochamController implements the CRUD actions for HocHam model.
 */
class ThongkeController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionTknganhnghe() {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = HoKinhDoanh::find()->count();
        $tknganhnghe = TkHkdNganhnghe::find()->select('ten_linhvuc,sl_hokinhdoanh')->asArray()->orderBy('ten_linhvuc')->all();
        $tkphuong = TkHkdPhuong::find()->select('ten_phuong,sl_hokinhdoanh')->asArray()->orderBy('ten_phuong')->all();

        $dn = DoanhNghiep::find()->count();
        $tknganhnghedn = TkDnNganhnghe::find()->select('ten_linhvuc,sl_doanhnghiep')->asArray()->orderBy('ten_linhvuc')->all();
        $tkphuongdn = TkDnPhuong::find()->select('ten_phuong,sl_doanhnghiep')->asArray()->orderBy('ten_phuong')->all();
        //  DebugService::dumpdie($tknganhnghe);


        return $this->render('tknganhnghe', [
                    'hkd' => $hkd,
                    'dn' => $dn,
                    'tknganhnghe' => $tknganhnghe,
                    'tkphuong' => $tkphuong,
                    'tknganhnghedn' => $tknganhnghedn,
                    'tkphuongdn' => $tkphuongdn,
        ]);
    }

    public function actionTkphuong() {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = HoKinhDoanh::find()->count();
        $tkbennghe = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 1'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkbenthanh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 2'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcaukho = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 3'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcaulanh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 4'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcogiang = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 5'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkdakao = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 6'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcutrinh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 16'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkthaibinh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 8'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkngulao = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 9'")->asArray()->orderBy('ten_linhvuc')->all();
        $tktandinh = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 10'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk11 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 11'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk12 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 12'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk13 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 13'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk14 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 14'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk15 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 15'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk17 = TkPhuongNn::find()->select('ten_phuong,ten_linhvuc,sl_hokinhdoanh')->where("ten_phuong='Phường 18'")->asArray()->orderBy('ten_linhvuc')->all();
///DN
        $dn = DoanhNghiep::find()->count();
        $tkbennghe_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 1'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkbenthanh_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 2'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcaukho_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 3'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcaulanh_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 4'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcogiang_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 5'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkdakao_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 6'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkcutrinh_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 16'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkthaibinh_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 8'")->asArray()->orderBy('ten_linhvuc')->all();
        $tkngulao_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 9'")->asArray()->orderBy('ten_linhvuc')->all();
        $tktandinh_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 10'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk11_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 11'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk12_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 12'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk13_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 13'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk14_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 14'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk15_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 15'")->asArray()->orderBy('ten_linhvuc')->all();
        $tk17_dn = TkPhuongNnDn::find()->select('ten_phuong,ten_linhvuc,sl_doanhnghiep')->where("ten_phuong='Phường 18'")->asArray()->orderBy('ten_linhvuc')->all();
        return $this->render('tkphuong', [
                    'hkd' => $hkd,
                    'tkbennghe' => $tkbennghe,
                    'tkbenthanh' => $tkbenthanh,
                    'tkcaukho' => $tkcaukho,
                    'tkcaulanh' => $tkcaulanh,
                    'tkcogiang' => $tkcogiang,
                    'tkdakao' => $tkdakao,
                    'tkcutrinh' => $tkcutrinh,
                    'tkthaibinh' => $tkthaibinh,
                    'tkngulao' => $tkngulao,
                    'tktandinh' => $tktandinh,
                    'tk11' => $tk11,
                    'tk12' => $tk12,
                    'tk13' => $tk13,
                    'tk14' => $tk14,
                    'tk15' => $tk15,
                    'tk17' => $tk17,
                    'dn' => $dn,
                    'tkbennghe_dn' => $tkbennghe_dn,
                    'tkbenthanh_dn' => $tkbenthanh_dn,
                    'tkcaukho_dn' => $tkcaukho_dn,
                    'tkcaulanh_dn' => $tkcaulanh_dn,
                    'tkcogiang_dn' => $tkcogiang_dn,
                    'tkdakao_dn' => $tkdakao_dn,
                    'tkcutrinh_dn' => $tkcutrinh_dn,
                    'tkthaibinh_dn' => $tkthaibinh_dn,
                    'tkngulao_dn' => $tkngulao_dn,
                    'tktandinh_dn' => $tktandinh_dn,
                    'tk11' => $tk11_dn,
                    'tk12' => $tk12_dn,
                    'tk13' => $tk13_dn,
                    'tk14' => $tk14_dn,
                    'tk15' => $tk15_dn,
                    'tk17' => $tk17_dn,
        ]);
    }

}

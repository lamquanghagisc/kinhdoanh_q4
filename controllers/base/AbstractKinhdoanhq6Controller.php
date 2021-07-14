<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 7/8/2017
 * Time: 3:41 PM
 */

namespace app\controllers\base;

use yii\filters\AccessControl;
use yii\web\Controller;

class AbstractKinhdoanhq6Controller extends Controller
{

    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'logout', 'index', 'thongtincanhan', 'map', 'changepass', 'search', 'bando', 'huongdan', 'about', 'contact', 'viewbando',
                            ////hokinhdoanh-bando
                            'hokinhdoanh-geojson', 'hokinhdoanh-filter', 'list-hokinhdoanh', 'zoom-giaothong', 'search-hokinhdoanh', 'hokinhdoanh-get', 'hokinhdoanh-incircle', 'poidetail-incircle', 'vipham', 'timkiem', 'thuocla-incircle', 'dientu-incircle', 'vutruong-incircle',
                            ///doanhnghiep-bando
                            'doanhnghiep-geojson', 'list-doanhnghiep', 'doanhnghiep-get', 'search-doanhnghiep', 'doanhnghiep-filter',
                            ///diemgiuxe-bando
                            'diemgiuxe-geojson', 'list-diemgiuxe', 'diemgiuxe-get',
                            ///vanphong-bando
                            'vanphong-geojson', 'list-vanphong', 'vanphong-get',
                            ///quanlyhkd
                            'get',
                            'view', 'vitri',
                            ////quản trị hệ thống
                            'doi-mat-khau', 'thong-tin-ca-nhan', 'dang-nhap', 'dang-xuat',],
                        'roles' => ['ubnd-phuong'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login', 'vitri', 'index', 'about', 'contact', 'huongdan', 'bando', 'hokinhdoanh-geojson', 'doanhnghiep-geojson', 'hokinhdoanh-filter', 'zoom-giaothong', 'list-hokinhdoanh', 'search-hokinhdoanh', 'hokinhdoanh-get', 'search-doanhnghiep', 'doanhnghiep-filter',
                            'list-doanhnghiep', 'doanhnghiep-get', 'hokinhdoanh-incircle', 'thuocla-incircle', 'poidetail-incircle', 'search', 'dientu-incircle', 'vutruong-incircle', 'dang-nhap', 'dang-xuat',], 'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'login', 'logout', 'index', 'thongtincanhan', 'map', 'changepass', 'search', 'bando', 'huongdan', 'about', 'contact', 'viewbando',
                            ////hokinhdoanh-bando
                            'hokinhdoanh-geojson', 'hokinhdoanh-filter', 'list-hokinhdoanh', 'zoom-giaothong', 'search-hokinhdoanh', 'hokinhdoanh-get', 'hokinhdoanh-incircle', 'poidetail-incircle', 'createvipham', 'vipham', 'updatevipham', 'deletevipham', 'timkiem', 'thuocla-incircle', 'dientu-incircle', 'vutruong-incircle',
                            ///doanhnghiep-bando
                            'doanhnghiep-geojson', 'list-doanhnghiep', 'doanhnghiep-get', 'search-doanhnghiep', 'doanhnghiep-filter', 'readexcel',
                            ///diemgiuxe-bando
                            'diemgiuxe-geojson', 'list-diemgiuxe', 'diemgiuxe-get',
                            ///vanphong-bando
                            'vanphong-geojson', 'list-vanphong', 'vanphong-get',
                            ///quanlyhkd
                            'get',
                            'create', 'view', 'update', 'delete', 'updatetaikhoan', 'get',
                            ////quản trị hệ thống
                            'thong-tin-ca-nhan', 'danh-sach', 'doi-mat-khau', 'dang-nhap', 'dang-xuat', 'vitri',
                        ], // add all actions to take guest to login page
                        'roles' => ['admin'],
                    ],
                ],
                'denyCallback' => function () {
                    return \Yii::$app->response->redirect(['user/site/index']);
                },
            ],
        ];
    }

}

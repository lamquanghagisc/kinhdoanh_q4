<?php

use app\services\UtilityService;

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 4/22/2017
 * Time: 10:24 AM
 */
?>
<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="nav-item start active open">
            <a href="<?= Yii::$app->urlManager->createUrl('bando/bando') ?>"  class="nav-link nav-toggle">
                <i class="fa fa-home"></i>
                <span class="title">Trang chủ</span>
                <span class="selected"></span>
            </a>
        </li>
<!--        <li class="nav-item ">
            <a href="<?= Yii::$app->urlManager->createUrl('site/huongdan') ?>" class="nav-link nav-toggle">
                <i class="fa fa-info"></i>
                <span class="title">Hướng dẫn sử dụng</span>
            </a>
        </li>-->
        <li class="heading">
            <h3 class="uppercase">Quản lý</h3>
        </li>
      
       <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-user-circle"></i>
                <span class="title">Hộ kinh doanh</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                  <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh') ?>" class="nav-link ">
                      <i class="fa fa-list"></i>   <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/timkiem') ?>" class="nav-link ">
                       <i class="fa fa-search"></i>   <span class="title">Tìm kiếm</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/readexcel') ?>" class="nav-link ">
                    <i class="fa fa-upload"></i>     <span class="title">Import dữ liệu</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-building-o"></i>
                <span class="title">Doanh nghiệp</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                  <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('doanhnghiep') ?>" class="nav-link ">
                      <i class="fa fa-list"></i>   <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('doanhnghiep/timkiem') ?>" class="nav-link ">
                     <i class="fa fa-search"></i>    <span class="title">Tìm kiếm</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('doanhnghiep/readexcel') ?>" class="nav-link ">
                    <i class="fa fa-upload"></i>     <span class="title">Import dữ liệu</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-car"></i>
                <span class="title">Điểm giữ xe</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                  <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('diemgiuxe') ?>" class="nav-link ">
                    <i class="fa fa-list"></i>     <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('diemgiuxe/timkiem') ?>" class="nav-link ">
                    <i class="fa fa-search"></i>     <span class="title">Tìm kiếm</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-building"></i>
                <span class="title">Văn phòng cho thuê</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                  <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('vanphong') ?>" class="nav-link ">
                  <i class="fa fa-list"></i>       <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('vanphong/timkiem') ?>" class="nav-link ">
                   <i class="fa fa-search"></i>      <span class="title">Tìm kiếm</span>
                    </a>
                </li>
            </ul>
        </li>
         <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-newspaper-o"></i>
                <span class="title">Tin tức và sự kiện</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                  <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('tintuc') ?>" class="nav-link ">
                      <i class="fa fa-list"></i>   <span class="title">Quản lý tin tức</span>
                    </a>
                </li>
              
            </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase">Danh mục</h3>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>dmlinhvuc" class="nav-link ">
                <i class="fa fa-list"></i>
                <span class="title">Lĩnh vực quản lý</span>

            </a>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>dmmanganh" class="nav-link ">
                <i class="fa fa-book "></i>
                <span class="title">Mã ngành kinh tế</span>

            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Thống kê</h3>
        </li>
          <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>thongke/tknganhnghe" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Theo ngành nghề</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>thongke/tkphuong" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Theo phường</span>
            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Tài khoản</h3>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>auth/quan-ly-tai-khoan/danh-sach" class="nav-link nav-toggle">
                <i class="fa fa-users"></i>
                <span class="title">Quản lý tài khoản</span>
            </a>
        </li>

    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->

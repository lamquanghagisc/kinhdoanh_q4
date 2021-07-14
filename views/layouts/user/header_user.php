<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 4/22/2017
 * Time: 10:27 AM
 */
?>

<div class="page-header navbar navbar-fixed-top ">
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="<?= Yii::$app->homeUrl ?>">
                <img src="<?= Yii::$app->homeUrl ?>resources/img/layout4/logo_q1.png" alt="logo" width="180px"
                     class="logo-default"/>  </a>

        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
       
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user dropdown-dark">
                       

                    </li>
                    <li class="separator hide"> </li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" >
                        <a href="<?= Yii::$app->urlManager->createUrl('site/contact') ?>" class="dropdown-toggle"  data-hover="dropdown" >
                            <i class="icon-home"></i>
                            <span class="badge badge-danger"> GIỚI THIỆU</span>
                        </a>

                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->

                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark">
                        <a href="<?= Yii::$app->urlManager->createUrl('site/huongdan') ?>" class="dropdown-toggle"  data-hover="dropdown" >
                            <i class="icon-doc"></i>
                            <span class="badge badge-danger">HƯỚNG DẪN</span>
                        </a>

                    </li>
                    <!-- END INBOX DROPDOWN -->

                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                        <a href="<?= Yii::$app->urlManager->createUrl('user/bando') ?>" class="dropdown-toggle" data-hover="dropdown">
                            <i class="icon-map"></i>
                            <span class="badge badge-danger">TRA CỨU VỊ TRÍ</span>
                        </a>
                    </li>
                     <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                        <a href="<?= Yii::$app->urlManager->createUrl('site/about') ?>" class="dropdown-toggle" data-hover="dropdown">
                            <i class="icon-call-end"></i>
                            <span class="badge badge-danger">LIÊN HỆ</span>
                        </a>
                    </li>

                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <?php if (!Yii::$app->user->isGuest): ?>

                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true" >
                                <img alt="" class="img-circle" src="<?= Yii::$app->homeUrl ?>resources/img/layout/avatar.png">
                                <span class="username username-hide-mobile"><?= Yii::$app->user->identity->ten_dang_nhap ?></span>

                                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/thong-tin-ca-nhan') ?>">
                                        <i class="fa fa-user"></i> Thông tin cá nhân </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/doi-mat-khau') ?>">
                                        <i class="fa fa-key"></i> Đổi mật khẩu </a>
                                </li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('bando/bando') ?>">
                                        <i class="fa fa-book"></i> Quản lý </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/dang-xuat') ?>">
                                        <i class="fa fa-sign-out"></i> Đăng xuất </a>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="<?= Yii::$app->urlManager->createUrl('auth/auth/dang-nhap') ?>" class="dropdown-toggle" >
                                <i class="fa fa-user"></i>Đăng nhập 

                            </a>

                        </li>

                    <?php endif; ?>
                    <!-- END USER LOGIN DROPDOWN -->

                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>








    <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown dropdown-user dropdown-dark">
                <a class="dropdown-toggle" style="color: white;padding: 10px 0px 0px 0px" >

                </a>

            </li>

        </ul>
    </div>



</div>

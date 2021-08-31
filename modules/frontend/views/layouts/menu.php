<?php
$pathInfo = Yii::$app->request->pathInfo;
// var_dump(Yii::$app->urlManager->createUrl('tin-tuc'));
?>

<div class="bg-white">
    <div class="menu-content container">
        <div class="d-lg-none push">
            <button type="button" id="toggle_button" class="btn btn-block btn-light d-flex justify-content-between align-items-center js-class-toggle-enabled" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                Menu
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div id="main-navigation" class="d-lg-block push d-none">
            <ul class="nav-main nav-main-horizontal nav-main-hover">
                <li class="nav-main-item">
                    <a class="nav-main-link  <?= $pathInfo == '' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl(['user/site/index'])?>">
                        <i class="nav-main-link-icon fa fa-home"></i>
                        <span class="text-uppercase font-w700">Trang chủ</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $pathInfo == 'tra-cuu-vi-tri' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('tra-cuu-vi-tri')?>">
                        <i class="nav-main-link-icon fa fa-map"></i>
                        <span class="text-uppercase font-w700">Tra cứu vị trí</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $pathInfo == 'tin-tuc' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('tin-tuc')?>">
                        <i class="nav-main-link-icon fa fa-list"></i>
                        <span class="text-uppercase font-w700">Tin tức</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $pathInfo == 'video' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('video')?>">
                        <i class="nav-main-link-icon fa fa-play-circle"></i>
                        <span class="text-uppercase font-w700">Media</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $pathInfo == 'san-pham' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('san-pham')?>">
                        <i class="nav-main-link-icon fas fa-poll-h"></i>
                        <span class="text-uppercase font-w700">Sản phẩm</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $pathInfo == 'su-kien' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('su-kien')?>">
                        <i class="nav-main-link-icon fas fa-calendar-day"></i>
                        <span class="text-uppercase font-w700">Sự kiện</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $pathInfo == 'doanh-nghiep-tieu-bieu' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('doanh-nghiep-tieu-bieu')?>">
                        <i class="nav-main-link-icon fa fa-briefcase"></i>
                        <span class="text-uppercase font-w700">Doanh nghiệp tiêu biểu</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $pathInfo == 'lien-he' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('lien-he')?>">
                        <i class="nav-main-link-icon fa fa-envelope"></i>
                        <span class="text-uppercase font-w700">Liên hệ</span>
                    </a>
                </li>
                <!-- <li class="nav-main-item">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                   
                    </div>
                </li>

                </li> -->
                <?php if(!Yii::$app->user->isGuest):?>
                    <li class="nav-main-item">
                        <a class="nav-main-link <?= $pathInfo == 'lien-he' ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('admin/map/index')?>">
                            <i class="nav-main-link-icon fa fa-user-cog"></i>
                            <span class="text-uppercase font-w700">Quản lý</span>
                        </a>
                    </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</div>

<script>
    $("#toggle_button").click(function(){
        $("#main-navigation").toggleClass("d-none");
    });
</script>
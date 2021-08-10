<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/4/2021
 * Time: 8:51 AM
 */
$this->title = 'Quản lý kinh doanh quận 4';
?>

<div class="content-full-width">

    <div class="block">
        <div class="js-slider slick-dotted-inner slick-dotted-white" id="wrapper">
            <div class="slick-slider"><img src="<?= Yii::$app->homeUrl ?>resources/img/banner/1.jpg"
                                           alt="slider image" width="100%"></div>
            <div class="slick-slider"><img src="<?= Yii::$app->homeUrl ?>resources/img/banner/2.jpg"
                                           alt="slider image" width="100%"></div>
            <div class="slick-slider"><img src="<?= Yii::$app->homeUrl ?>resources/img/banner/3.jpg"
                                           alt="slider image" width="100%"></div>
            <div class="slick-slider"><img src="<?= Yii::$app->homeUrl ?>resources/img/banner/4.jpg"
                                           alt="slider image" width="100%"></div>
            <div class="slick-slider"><img src="<?= Yii::$app->homeUrl ?>resources/img/banner/5.jpg"
                                           alt="slider image" width="100%"></div>
            <div class="slick-slider"><img src="<?= Yii::$app->homeUrl ?>resources/img/banner/6.jpg"
                                           alt="slider image" width="100%"></div>
        </div>
    </div>


    <script>
        // jQuery(function () {
        //     Dashmix.helpers('slick');
        // });
        $(document).ready(function () {
            $('.js-slider').slick({
                dots: true,
                arrows: false,
                fade: true,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        })
    </script>
</div>

<div class="content content-full">
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-bordered">
                <div class="block-header">
                    <h3 class="block-title text-danger"><span class="fa fa-newspaper"></span> <strong>Tin tức</strong>
                    </h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <?php foreach ($model['tin_tuc'] as $i => $item): ?>
                            <div class="col-md-3 bordered ">
                                <h3 class="mt-username"><a
                                            href="<?= Yii::$app->urlManager->createUrl('tin-tuc' . '/' . $item->slug)?>"> <?= $item->tieu_de ?></a>
                                </h3>
                                <p class="mt-user-title custom-text-summary"> <?= $item->tom_tat ?> </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="block block-bordered">
                <div class="block-header">
                    <h3 class="block-title text-danger"><span class="fa fa-briefcase"></span> <strong>Doanh nghiệp tiêu biểu</strong>
                    </h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <?php foreach ($model['doanh_nghiep'] as $i => $item): ?>
                            <div class="col-md-6 bordered ">
                                <h3 class="mt-username"><a
                                            href="<?= Yii::$app->urlManager->createUrl('doanh-nghiep-tieu-bieu' . '/d' . $item->id_doanhnghiep)?>"> <?= $item->ten_dn ?></a>
                                </h3>
                                <p class="mt-user-title custom-text-summary">
                                    Số giấy phép: <?= $item->so_giayphep?><br>
                                    Ngành kinh doanh: <?= $item->nganh_kd?><br>
                                    Địa chỉ: <?= $item->so_nha . ' ' . $item->ten_duong . ', '. $item->ten_phuong ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/7/2021
 * Time: 12:10 PM
 */
use yii\widgets\LinkPager;
$this->title = 'Doanh nghiệp tiêu biểu';
?>

<div class="content content-full">
    <h2 class="text-danger"><span class="fa fa-briefcase"></span> <strong>Doanh nghiệp tiêu biểu</strong></h2>

    <div class="row row-deck">
        <?php foreach ($model as $i => $item): ?>
            <div class="col-lg-12">
                <a class="block block-rounded" href="<?= Yii::$app->urlManager->createUrl('doanh-nghiep-tieu-bieu' . '/d' . $item->id_doanhnghiep)?>">
                    <div class="block-content">
                        <h4 class="mb-1"><?= $item->ten_dn ?></h4>
                        <p>
                            Địa chỉ: <?= $item->so_nha . ' ' . $item->ten_duong . ', '. $item->ten_phuong ?><br>
                            Điện thoại: <?= $item->dien_thoai ?><br>
                        </p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <div class="col-lg-12">
            <?= LinkPager::widget([
                'pagination' => $pagination,
                'prevPageCssClass' => 'page-item',
                'nextPageCssClass' => 'page-item',
                'prevPageLabel' => '<i class="fa fa-angle-double-left"></i>',
                'nextPageLabel' => '<i class="fa fa-angle-double-right"></i>',
                'linkContainerOptions' => [
                    'class' => 'page-item'
                ],
                'linkOptions' => [
                    'class' => 'page-link'
                ]
            ]); ?>
        </div>
    </div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/7/2021
 * Time: 4:25 PM
 */

$this->title = $model->tieu_de;
$this->params['breadcrumbs'][] = ['label' => 'Tin tức', 'url' => Yii::$app->urlManager->createUrl('tin-tuc/1')];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content content-full padding-t-0">
    <div class="block">
        <div class="block-content">
            <h2><?= $model->tieu_de?></h2>
            <p class="font-size-sm">
                <span class="text-black"><?= date('H:i:s d-m-Y', strtotime($model->thoi_gian_dang))?></span>
            </p>
            <p>
                <?= htmlspecialchars_decode($model->noi_dung)?>
            </p>
        </div>
    </div>
</div>

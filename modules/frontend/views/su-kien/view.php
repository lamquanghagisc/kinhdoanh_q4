<?php
use kartik\social\FacebookPlugin;
/**
 * Created by PhpStorm.
 * User: Lam Quang Ha
 * Date: 09/08/2021
 * Time: 23:11 PM
 */

$this->title = $model->ten_su_kien;
$this->params['breadcrumbs'][] = ['label' => 'Sự kiện', 'url' => Yii::$app->urlManager->createUrl('su-kien/1')];
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    h6 {
          text-align: center;
        }
       
</style>
<div class="content content-full padding-t-0">
    <div class="block">
        <div class="block-content">
            <h2><?= $model->ten_su_kien?></h2>
            <p class="font-size-sm">
                <span class="text-black"><?= $model->getViews()->count()?> Lượt xem. <?= date('H:i d-m-Y', strtotime($model->thoi_gian_dang))?></span>
            </p>
            <p>
                <?= htmlspecialchars_decode($model->tom_tat)?>
            </p>
            <div>
                <img class="card-img-top" src="<?= Yii::$app->homeUrl?>../uploads/file/hinhsukien/<?=$model->anh_dai_dien?>" alt="Card image cap">
            </div>
            <p>
                <?= htmlspecialchars_decode($model->mo_ta)?>
            </p>
           
            
            
           
            <div>
                <?= FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'large', 'layout'=>'button_count', 'mobile_iframe'=>'false']])?>
            </div>
        </div>
    </div>
</div>

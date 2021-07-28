<?php
use kartik\social\FacebookPlugin;
use wbraganca\videojs\VideoJsWidget;
/**
 * Created by PhpStorm.
 * User: Lâm Quang Hà
 * Date: 28/7/2021
 * Time: 0:42 PM
 */

$this->title = $model->tieu_de;
$this->params['breadcrumbs'][] = ['label' => 'Tin tức', 'url' => Yii::$app->urlManager->createUrl('video/1')];
$this->params['breadcrumbs'][] = $this->title;
// dd($model->noi_dung);
?>

<div class="content content-full padding-t-0">
    <div class="block">
        <div class="block-content">
            <h2><?= $model->tieu_de?></h2>
            <p class="font-size-sm">
                <span class="text-black"><?= date('H:i:s d-m-Y', strtotime($model->thoi_gian_dang))?></span>
            </p>
           
            <img src="../uploads/file/anhvideo/<?=$model->anh_dai_dien?> " alt=" " class="img-responsive" />
            <div class="ratio ratio-16x9">
                <video src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="" controls></video>
            </div>
            <p>
                <?= htmlspecialchars_decode($model->noi_dung)?>
            
            </p>
            <div class="ratio ratio-16x9">
            
            </div>
            <div>
                <?= FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'large', 'layout'=>'button_count', 'mobile_iframe'=>'false']])?>
            </div>
        </div>
    </div>
</div>

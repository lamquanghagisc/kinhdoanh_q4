<?php
/**
 * Created by PhpStorm.
 * User: Lâm Quang Hà
 * Date: 27/07/2021
 * Time: 23:30 AM
 */

// use yii\grid\GridView;
use kartik\form\ActiveForm;
// use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\DCrud\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;

$this->title = 'Sự kiện';

?>
<style>
 
</style>
<div class="content content-full">


    <div class="row">
        <!-- trái -->
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-danger"><span class="fa fa-newspaper"></span> <strong>Sự kiện</strong></h2>
                </div>
            </div>
            <div class="row">
               
            
                <?php foreach ($model as $i => $item): ?>
                    <div class="col-lg-12">
                        <div class="card-deck">
                        <div class="card" style="width: 18rem;">-
                                    <img class="card-img-top" src="<?= Yii::$app->homeUrl?>../uploads/file/hinhsukien/<?=$item->anh_dai_dien?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $item->ten_su_kien ?></h5>
                                        <h6 class="card-subtitle mb-2" style="color:#ff00bf">Từ: <?= date('H:i d-m-Y ', strtotime($item->thoi_gian_bat_dau ))?></h6>
                                        <h6 class="card-subtitle mb-2" style="color:#ff00bf">Đến: <?= date('H:i d-m-Y ', strtotime($item->thoi_gian_ket_thuc )) ?></h6>
                                        <h6 class="card-subtitle mb-2 text-muted">Địa điểm: <?= $item->dia_diem ?></h6>
                                        <p class="card-text"><?= $item->tom_tat ?></p>
                                    
                                        <a href="<?= Yii::$app->urlManager->createUrl('su-kien' . '/' . $item->slug) ?>" class="btn btn-primary">Chi tiết</a>
                                    </div>
                                    <div class="card-footer">
                                        <p class="font-size-sm">
                                            <span class="text-black"><?= $item->getViews()->count()?> Lượt xem. </span>
                                        </p>
                                    </div>
                                </div>
                        </div>    
                    </div>      
                <?php endforeach; ?>
            
                
                <div class="col-lg-12">
                    <?= LinkPager::widget([
                        'pagination' => $pagination,
//                    'linkOptions' => ['href' => 'tin-tuc111111','class' => 'page-link']
                    ]); ?>
                </div>
            </div>
            <!-- test -->
            
              <!-- test -->
        

        </div>
        <!-- trái -->
        <div class="col-lg-3">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-danger"><span class="fa fa-search"></span> <strong>Tìm kiếm</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="block">
                        <div class="block-content">
                            <?php $form = ActiveForm::begin([
                                'method' => 'post',
                                'action' => Yii::$app->urlManager->createUrl('user/su-kien/index'),
                            ]) ?>
                            <div class="form-group">
                                <?= Html::input('text', 'q', $q, ['class' => 'form-control']) ?>

                            </div>
                            <div class="form-group">
                                <?= Html::dropDownList('c', $c, ArrayHelper::map($nganhnghe, 'id', 'ten_nganh'), ['class' => 'form-control', 'prompt' => 'Chọn ngành nghề']) ?>

                            </div>
                            <div class="form-group">
                                <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>

                            </div>


                            <?php ActiveForm::end() ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

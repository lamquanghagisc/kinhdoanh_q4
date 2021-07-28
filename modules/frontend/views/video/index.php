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

$this->title = 'Video';

?>
<div class="content content-full">


    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-danger"><span class="fa fa-newspaper"></span> <strong>Video</strong></h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($model as $i => $item): ?>
                    <div class="col-lg-12">
                        <a class="block block-rounded"
                           href="<?= Yii::$app->urlManager->createUrl('video' . '/' . $item->alias_title) ?>">
                            <div class="block-content">
                                <h4 class="mb-1"><?= $item->tieu_de ?></h4>
                          
                                <img src="<?= Yii::$app->homeUrl?>../uploads/file/anhvideo/<?=$item->anh_dai_dien?> " alt=" " class="img-responsive" />
                                <p>
                                    <?= $item->tom_tat ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                <div class="col-lg-12">
                    <?= LinkPager::widget([
                        'pagination' => $pagination,
//                    'linkOptions' => ['href' => 'tin-tuc111111','class' => 'page-link']
                    ]); ?>
                </div>
            </div>

        </div>
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
                                'action' => Yii::$app->urlManager->createUrl('user/video/index'),
                            ]) ?>
                            <div class="form-group">
                                <?= Html::input('text', 'q', $q, ['class' => 'form-control']) ?>

                            </div>
                            <div class="form-group">
                                <?= Html::dropDownList('c', $c, ArrayHelper::map($loaitin, 'id', 'ten_loai'), ['class' => 'form-control', 'prompt' => 'Chọn loại tin']) ?>

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

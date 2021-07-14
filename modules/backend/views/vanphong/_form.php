<?php

use app\models\VanPhong;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this View */
/* @var $model VanPhong */
/* @var $form ActiveForm */
?>

<div class="van-phong-form">

    <?php
    $form = ActiveForm::begin([
                'options' => [
                    'class' => 'skin skin-square',
                    'enctype' => 'multipart/form-data'
                ]
            ])
    ?>
    <h4 class="content-heading text-primary">Thông tin chung</h4>
    <div class="row">
        <div class="col-lg-6" autofocus>
            <?= $form->field($model['vanphong'], 'ten_vanphong', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên văn phòng') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model['vanphong'], 'chu_dau_tu')->textInput(['maxlength' => true])->label('Chủ đầu tư') ?>
        </div>

    </div>  
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['vanphong'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['vanphong'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['vanphong'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'))->label('Tên phường') ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4">
            <?=
            $form->field($model['vanphong'], 'tien_phi')->widget(MaskedInput::className(), [
                'options' => [
                    'class' => 'form-control'
                ],
                'clientOptions' => [
                    'alias' => 'decimal',
                    'groupSeparator' => '.',
                    'radixPoint' => ',',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => true
                ],
            ])->label('Tiền phí')
            ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['vanphong'], 'dien_thoai')->textInput(['maxlength' => true])->label('Điện thoại') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['vanphong'], 'coquan_quanly')->textInput(['maxlength' => true])->label('Cơ quan quản lý') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['vanphong'], 'quy_mo')->textInput(['maxlength' => true])->label('Quy mô') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['vanphong'], 'tien_ich')->textInput(['maxlength' => true])->label('Tiện ích') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 form-group">
            <?php if (!Yii::$app->request->isAjax) { ?>
                <?= Html::submitButton($model['vanphong']->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model['vanphong']->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php } ?>
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/vanphong/index']) ?>"
               class="btn btn-light float-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


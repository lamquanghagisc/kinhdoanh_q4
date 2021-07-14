<?php

use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="diem-giu-xe-timkiem">
    <?php
    $form = ActiveForm::begin([
                'action' => ['timkiem'],
                'method' => 'get',
    ]);
    ?>


    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model['search'], 'ten_diemgiuxe')->input('text')->label('Tên điểm giữ xe') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model['search'], 'chu_dau_tu')->input('text')->label('Chủ đầu tư') ?>
        </div>

    </div>
    <div class="row">

        <div class="col-lg-4">
            <?= $form->field($model['search'], 'so_nha')->input('text')->label('Số nhà') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['search'], 'ten_duong')->dropDownList(ArrayHelper::map($model['giaothong'], 'tenduong', 'tenduong'), ['prompt' => 'Chọn đường'])->label('Tên đường') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['search'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'), ['prompt' => 'Chọn phường'])->label('Tên phường') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="form-group">

                <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary pull-right']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>
    <div style="clear: both"></div>
</div>


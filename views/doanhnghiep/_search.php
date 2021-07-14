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
<div class="row">
    <div class="col-lg-12">
        <div class="portlet box">
            <div class="portlet-title bg-primary">
                <div class="caption">
                    <span><i class="fa fa-search"></i> Tìm kiếm Doanh Nghiệp</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php
                $form = ActiveForm::begin([
                            'action' => ['timkiem'],
                            'method' => 'get',
                ]);
                ?>
                <div class="col-lg-6">
                    <?= $form->field($model['search'], 'nguoi_daidien')->input('text')->label('Người đại diện') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model['search'], 'ten_dn')->input('text')->label('Tên doanh nghiệp') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model['search'], 'ma_nganh')->input('text')->label('Mã ngành') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model['search'], 'nganh_kd')->input('text')->label('Nội dung kinh doanh') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model['search'], 'so_nha')->input('text')->label('Số nhà') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model['search'], 'ten_duong')->dropDownList(ArrayHelper::map($model['giaothong'], 'tenduong', 'tenduong'), ['prompt' => 'Chọn đường'])->label('Tên đường') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model['search'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'), ['prompt' => 'Chọn phường'])->label('Tên phường') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model['search'], 'so_giayphep')->input('text')->label('Số giấy phép') ?>
                </div>
                <div class="col-lg-4 ">
                    <?=
                    $form->field($model['search'], 'tu_ngay')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Cấp từ ngày ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd/mm/yyyy'
                        ]
                    ])->label('Cấp từ ngày')
                    ?>
                </div>
                <div class="col-lg-4">
                    <?=
                    $form->field($model['search'], 'den_ngay')->widget(DatePicker::classname(), [
                        'options' => ['placeholder' => 'Cấp đến ngày ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd/mm/yyyy'
                        ]
                    ])->label('Cấp đến ngày')
                    ?>
                </div>

                <div class="col-lg-12 ">
                    <div class="form-group">
                        <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary pull-right']) ?>
                    </div>
                </div>
                <?php ActiveForm::end() ?>
                <div style="clear: both"></div>

            </div>
        </div>
    </div>
</div>

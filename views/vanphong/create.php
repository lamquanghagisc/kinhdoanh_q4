<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

$urlMN = Url::to(['vanphong/get']);
?>
<style>

    fieldset {
        padding: 1em;
        font:100%/1 sans-serif;
    }
</style>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('vanphong') ?>">Danh sách Văn phòng cho thuê</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Thêm mới Văn phòng cho thuê</span>
    </li>
</ul>
<?php
$form = ActiveForm::begin([
            'options' => [
                'class' => 'skin skin-square',
                'enctype' => 'multipart/form-data'
            ]
        ])
?>

<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Thêm mới Văn phòng cho thuê</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line form-group">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="thongtinchung">

                            <div class="col-sm-12">
                                <div class="col-sm-6" autofocus>
                                    <?= $form->field($model['vanphong'], 'ten_vanphong', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên Văn phòng cho thuê') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['vanphong'], 'chu_dau_tu')->textInput(['maxlength' => true])->label('Chủ đầu tư') ?>
                                </div>
                            </div>

                            <div class="col-sm-12">

                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'))->label('Tên phường') ?>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
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
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'dien_thoai')->textInput(['maxlength' => true])->label('Điện thoại') ?>
                                </div>
                                

                            </div>

                           
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'coquan_quanly')->textInput(['maxlength' => true])->label('Cơ quan quản lý') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'quy_mo')->textInput(['maxlength' => true])->label('Quy mô') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['vanphong'], 'tien_ich')->textInput(['maxlength' => true])->label('Tiện ích') ?>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-left">Thêm mới Văn phòng cho thuê</button>
                    <a href="<?= Yii::$app->urlManager->createUrl('vanphong') ?>"
                       class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
                </div>
                <div style="clear: both"></div>

            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div style="clear: both"></div>
<script>

    $("#cboCountry").change(function () {

        if ($(this).val() == "Chấm dứt") {

            $("#txtcboDenngay").hide();

            $("#txtcboTungay").show();

        } else if ($(this).val() == "Tạm ngừng") {

            $("#txtcboTungay").show();
            $("#txtcboDenngay").show();
        } else if ($(this).val() == "Đang hoạt động") {

            $("#txtcboTungay").hide();
            $("#txtcboDenngay").hide();
        }

    });

</script>
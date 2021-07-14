<?php

use app\models\DoanhNghiep;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$urlMN = Url::to(['doanhnghiep/get']);
/* @var $this View */
/* @var $model DoanhNghiep */
/* @var $form ActiveForm */
?>

<div class="doanh-nghiep-form">

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
        <div class="col-lg-12">
            <?= $form->field($model['doanhnghiep'], 'ten_dn', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên Doanh nghiệp') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'loaihinhdn_id')->dropDownList(ArrayHelper::map($model['loaihinhdn'], 'id_loaihinhdn', 'ten_loai'))->label('Loại hình') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'linhvuc_id')->dropDownList(ArrayHelper::map($model['linhvuc'], 'id_linhvuc', 'ten_linhvuc'))->label('Lĩnh vực') ?>
        </div>
        <div class="col-lg-4" no-padding-side>
            <?=
            $form->field($model['doanhnghiep'], 'ma_nganh')->widget(Select2::classname(), [
                'options' => ['placeholder' => 'Chọn mã ngành'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $urlMN,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                    //'delay' => 1000,
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateSelection' => new JsExpression('function(donvi) { return donvi.text; }'),
                    'templateResult' => new JsExpression('function(donvi) { return donvi.text; }'),
//
                ],
            ])->label('Mã ngành')
            ?>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'so_giayphep')->textInput(['maxlength' => true])->label('Số giấy phép') ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model['doanhnghiep'], 'ngaycap_giayphep')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ngày cấp ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])->label('Ngày cấp');
            ?>                            
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model['doanhnghiep'], 'ngay_thaydoi')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ngày thay đổi ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])->label('Ngày thay đổi');
            ?>                            
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'))->label('Tên phường') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'nganh_kd')->textarea()->label('Ngành nghề kinh Doanh') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'loaihinh_kinhte')->textInput(['maxlength' => true])->label('Loại hình kinh tế') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'ten_loaihinh')->textInput(['maxlength' => true])->label('Phân loại hình') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'so_laodong')->textInput(['maxlength' => true])->label('Số lao động') ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model['doanhnghiep'], 'von_dieule')->widget(MaskedInput::className(), [
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
            ])->label('Vốn điều lệ')
            ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'dien_thoai')->textInput(['maxlength' => true])->label('Điện thoại') ?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'tinhtrang_thue')->textarea()->label('Tình trạng thuế') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'quanly_thue')->textarea()->label('Đơn vị thuế quản lý') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'phuong_rasoat')->textarea()->label('Phường rà soát') ?>
        </div>

    </div>
    <h4 class="content-heading text-primary">Đại diện pháp lý</h4>
    <div class="row"> 
        <div class="col-lg-12">
            <?= $form->field($model['doanhnghiep'], 'nguoi_daidien')->textInput(['maxlength' => true])->label('Người đại diện') ?>
        </div>
    </div>

    <div class="row"> 
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'gioi_tinh')->dropDownList([1 => 'Nam', 2 => 'Nữ'], ['prompt' => 'Chọn giới tính'])->label('Giới tính') ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model['doanhnghiep'], 'ngay_sinh')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ngày sinh ...'],
                'value' => ($model['doanhnghiep']->ngay_sinh != null) ? date('d-m-Y', strtotime($model['doanhnghiep']->ngay_sinh)) : '',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])->label('Ngày sinh');
            ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'dan_toc')->dropDownList(ArrayHelper::map($model['dmdantoc'], 'ten_dantoc', 'ten_dantoc'), ['options' => ['Kinh' => ['Selected' => TRUE]]])->label('Dân tộc') ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'so_cmnd')->textInput(['maxlength' => true])->label('CMND số') ?>
        </div>
        <div class="col-lg-4">
            <?=
            $form->field($model['doanhnghiep'], 'ngay_cap')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ngày cấp ...',
                    'value' => ($model['doanhnghiep']->ngay_cap != null) ? date('d-m-Y', strtotime($model['doanhnghiep']->ngay_cap)) : '',],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])->label('Ngày cấp');
            ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'noi_cap')->textInput(['maxlength' => true])->label('Nơi cấp') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'quoc_tich')->dropDownList(ArrayHelper::map($model['dmquoctich'], 'ten_quoctich', 'ten_quoctich'), ['options' => ['Việt Nam' => ['Selected' => TRUE]]])->label('Quốc tịch') ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model['doanhnghiep'], 'thanh_vien')->textarea()->label('Thành viên') ?>
        </div>
    </div>
    <h4 class="content-heading text-primary">Tình trạng hoạt động</h4>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model['doanhnghiep'], 'tinhtrang_hd')->dropDownList(['Đang hoạt động' => 'Đang hoạt động', 'Tạm ngừng hoạt động' => 'Tạm ngừng hoạt động', 'Đã giải thể' => 'Đã giải thể'], ['prompt' => 'Chọn tình trạng'])->label(FALSE) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 form-group">
            <?php if (!Yii::$app->request->isAjax) { ?>
                <?= Html::submitButton($model['doanhnghiep']->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model['doanhnghiep']->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php } ?>
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/doanhnghiep/index']) ?>"
               class="btn btn-light float-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;
use yii\helpers\Url;

$urlMN = Url::to(['hokinhdoanh/get']);

/* @var $this yii\web\View */
/* @var $model app\models\HoKinhDoanh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ho-kinh-doanh-form">

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
            <?= $form->field($model['hokinhdoanh'], 'ten_hkd', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên Hộ kinh doanh') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?=
            $form->field($model['hokinhdoanh'], 'ma_nganh')->widget(Select2::classname(), [
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
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'linhvuc_id')->dropDownList(ArrayHelper::map($model['linhvuc'], 'id_linhvuc', 'ten_linhvuc'), ['prompt' => 'Chọn lĩnh vực'])->label('Lĩnh vực') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'so_giayphep')->textInput(['maxlength' => true])->label('Số giấy phép') ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model['hokinhdoanh'], 'ngaycap_giayphep')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ngày cấp ...'],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])->label('Ngày cấp');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'vi_tri')->textInput(['maxlength' => true])->label('Vị trí gian hàng') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'))->label('Tên phường') ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'dien_thoai')->textInput(['maxlength' => true])->label('Điện thoại') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'fax')->textInput(['maxlength' => true])->label('Số FAX') ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model['hokinhdoanh'], 'email'
            )->textInput(['placeholder' => 'Nhập chính xác địa chỉ email']);
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'website')->textInput(['maxlength' => true])->label('Website') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model['hokinhdoanh'], 'nganh_kd')->textarea()->label('Ngành, nghề kinh doanh') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?=
            $form->field($model['hokinhdoanh'], 'von_kd')->widget(MaskedInput::className(), [
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
            ])->label('Vốn')
            ?>
        </div>
    </div>

    <h4 class="content-heading text-primary">Người đại diện</h4>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model['hokinhdoanh'], 'nguoi_daidien')->textInput(['maxlength' => true])->label('Họ và tên đại diện Hộ kinh doanh') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'gioi_tinh')->dropDownList([1 => 'Nam', 2 => 'Nữ'], ['prompt' => 'Chọn giới tính'])->label('Giới tính') ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model['hokinhdoanh'], 'ngay_sinh')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ngày sinh ...'],
                'value' => ($model['hokinhdoanh']->ngay_sinh != null) ? date('d-m-Y', strtotime($model['hokinhdoanh']->ngay_sinh)) : '',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])->label('Ngày sinh');
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'dan_toc')->dropDownList(ArrayHelper::map($model['dmdantoc'], 'ten_dantoc', 'ten_dantoc'), ['options' => ['Kinh' => ['Selected' => TRUE]]])->label('Dân tộc') ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'quoc_tich')->dropDownList(ArrayHelper::map($model['dmquoctich'], 'ten_quoctich', 'ten_quoctich'), ['options' => ['Việt Nam' => ['Selected' => TRUE]]])->label('Quốc tịch') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'so_cmnd')->textInput(['maxlength' => true])->label('CMND số') ?>
        </div>
        <div class="col-lg-3">
            <?=
            $form->field($model['hokinhdoanh'], 'ngay_cap')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Ngày cấp ...',
                    'value' => ($model['hokinhdoanh']->ngay_cap != null) ? date('d-m-Y', strtotime($model['hokinhdoanh']->ngay_cap)) : '',],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ])->label('Ngày cấp');
            ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model['hokinhdoanh'], 'noi_cap')->textInput(['maxlength' => true])->label('Nơi cấp') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model['hokinhdoanh'], 'hokhau_thuongtru')->textInput(['maxlength' => true])->label('Hộ khẩu thường trú') ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model['hokinhdoanh'], 'noisong_hientai')->textInput(['maxlength' => true])->label('Chỗ ở hiện tại') ?>
        </div>
    </div>
    <h4 class="content-heading text-primary">Tình trạng hoạt động</h4>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model['hokinhdoanh'], 'tinhtrang_hd')->dropDownList(['Đang hoạt động' => 'Đang hoạt động', 'Tạm ngừng hoạt động' => 'Tạm ngừng hoạt động', 'Đã giải thể' => 'Đã giải thể'], ['prompt' => 'Chọn tình trạng'])->label('Tình trạng hoạt động') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 form-group">
            <?php if (!Yii::$app->request->isAjax) { ?>
                <?= Html::submitButton($model['hokinhdoanh']->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model['hokinhdoanh']->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php } ?>
            <a href="<?= Yii::$app->urlManager->createUrl(['admin/hokinhdoanh/index']) ?>"
               class="btn btn-light float-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

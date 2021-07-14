<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\KhoSanPham */
/* @var $form yii\widgets\ActiveForm */
$dataList = \app\modules\backend\models\categories\SanPham::find()->andWhere(['id' => $model->sanpham_id])->all();
$data = ArrayHelper::map($dataList, 'id', function ($e) {
    return $e->ten . ' - ' . $e->loaisanpham_ten . ' - <b>[' . $e->hangsanxuat_ten . ']</b>';
});
$dataLoaiSanPham = array_values(ArrayHelper::map($const['categories']['loaisanpham'],'id', function($e){return $e->ten.' - '.$e->nhomsanpham->ten;}));
$dataHangSanXuat = array_values(ArrayHelper::map($const['categories']['hangsanxuat'],'id', 'ten'));
?>

<div class="kho-san-pham-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-9">
            <?= $form->field($model, 'sanpham_id')->widget(Select2::class, [
                'data' => $data,
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => Url::to(['categories/san-pham/list']),
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function(item) { return item.text + " ("+item.quy_cach +")" + " - " + item.loaisanpham_ten + " - <b>[" + item.hangsanxuat_ten + "]</b>" ; }'),
                    'templateSelection' => new JsExpression('function (item) { if(item.id == "" || typeof(item.loaisanpham_ten) == "undefined" || typeof(item.hangsanxuat_ten) == "undefined"){ return item.text;} else {return item.text + " ("+item.quy_cach +")" + " - " + item.loaisanpham_ten + " - <b>[" + item.hangsanxuat_ten + "]</b>";} }'),
                ],
            ]) ?>
        </div>
        <div class="col-lg-3">
            <?php if ($model->isNewRecord): ?>
            <?= $form->field($model, 'so_luong')->input('number') ?>
            <?php endif;?>
        </div>
    </div>


    <?php if ($model->isNewRecord): ?>
    <div class="alert alert-info">
        <span>Lưu ý: Nếu tìm không có sản phẩm thì nhập vào khung bên dưới</span>
        <div class="row">
            <div class="col-lg-9">
                <?= $form->field($model, 'san_pham')->input('text') ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'quy_cach')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'loai_san_pham')->widget(Typeahead::class,[
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => ['highlight'=>true],
                    'dataset' => [
                        [
                            'local' => $dataLoaiSanPham,
                            'limit' => 10
                        ]
                    ]
                ]) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'hang_san_xuat')->widget(Typeahead::class,[
                    'options' => ['placeholder' => ''],
                    'pluginOptions' => ['highlight'=>true],
                    'dataset' => [
                        [
                            'local' => $dataHangSanXuat,
                            'limit' => 10
                        ]
                    ]
                ]) ?>
            </div>
        </div>
    </div>


    <?php endif; ?>
    <div class="row">

        <div class="col-lg-3">
            <?= $form->field($model, 'ngay_nhap_kho')->widget(MaskedInput::class, [
                'clientOptions' => [
                    'alias' => 'date',
                ]
            ]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'gia_mua_vnd')->widget(MaskedInput::class, [
                'clientOptions' => [
                    'alias' => 'decimal',
                    'groupSeparator' => '.',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => true,
                ],
            ]) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ngay_het_han')->textInput() ?>
        </div>
    </div>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>

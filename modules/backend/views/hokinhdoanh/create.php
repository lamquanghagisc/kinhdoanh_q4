<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

$urlMN = Url::to(['hokinhdoanh/get']);

$this->title = (isset($const['title'])) ? $const['title'] : 'Thêm mới Hộ kinh doanh';
$this->params['breadcrumbs'][] = ['label' => 'Hộ kinh doanh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

    fieldset {
        padding: 1em;
        font: 100%/1 sans-serif;
    }
</style>


<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title text-uppercase">
                    <?= $this->title ?>
                </h3>
            </div>
            <div class="block-content padding-tb-05">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>
</div>


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
<?php

use yii\helpers\Url;

$urlMN = Url::to(['doanhnghiep/get']);

$this->title = (isset($const['title'])) ? $const['title'] : 'Thêm mới Doanh nghiệp';
$this->params['breadcrumbs'][] = ['label' => 'Doanh nghiệp', 'url' => ['index']];
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
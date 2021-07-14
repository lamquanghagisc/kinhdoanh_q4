<?php

use kartik\form\ActiveForm;
use yii\helpers\Url;

$urlMN = Url::to(['diemgiuxe/get']);
$this->title = (isset($const['title'])) ? $const['title'] : 'Thêm mới Điểm giữ xe';
$this->params['breadcrumbs'][] = ['label' => 'Điểm giữ xe', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

    fieldset {
        padding: 1em;
        font: 100%/1 sans-serif;
    }
</style>
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
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title text-uppercase">
                    <?= $this->title ?>
                </h3>
            </div>
            <div class="block-content padding-tb-05">
                <?=
                $this->render('_form', [
                    'model' => $model,
                ])
                ?>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div style="clear: both"></div>

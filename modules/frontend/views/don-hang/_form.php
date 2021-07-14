<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\DonHang */
/* @var $form yii\widgets\ActiveForm */
$categories = $const['categories'];
$khachhang = (ArrayHelper::map($const['categories']['khachhang'],'id', function($e){return $e->ten.' - '.$e->dia_chi;}));
//\app\services\Debug?ervice::dumpdie($khachhang);
?>

<div class="don-hang-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'khachhang_id')->widget(Select2::class,[
        'data' => $khachhang,
        'options' => ['placeholder' => 'Chọn khách hàng'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'ngay_ban')->widget(MaskedInput::class, [
        'clientOptions' => [
            'alias' => 'date',
        ]
    ]) ?>

    <?= $form->field($model, 'tong_so_tien')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

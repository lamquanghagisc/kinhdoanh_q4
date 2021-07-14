<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\LoaiSanPham */
/* @var $form yii\widgets\ActiveForm */
$categories = $const['categories']
?>

<div class="loai-san-pham-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nhomsanpham_id')->dropDownList(ArrayHelper::map($categories['nhomsanpham'],'id','ten'),['prompt' => 'Chọn nhóm sản phẩm']) ?>

    <?= $form->field($model, 'ghi_chu')->textInput(['maxlength' => true]) ?>

	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HoKinhDoanh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="van-phong-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_vanphong')->textInput() ?>

    <?= $form->field($model, 'chu_dau_tu')->textInput() ?>

     
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

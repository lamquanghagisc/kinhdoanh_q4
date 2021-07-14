<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HoKinhDoanh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diem-giu-xe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_diemgiuxe')->textInput() ?>

    <?= $form->field($model, 'chu_dau_tu')->textInput() ?>

     
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

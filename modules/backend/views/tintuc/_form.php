<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TinTuc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tin-tuc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tieu_de')->textInput() ?>

    <?= $form->field($model, 'duong_dan')->textInput() ?>

    <?= $form->field($model, 'noi_dung')->textarea(['rows' => 6]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

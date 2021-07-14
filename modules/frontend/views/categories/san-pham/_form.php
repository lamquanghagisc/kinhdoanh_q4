<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\SanPham */
/* @var $form yii\widgets\ActiveForm */
$categories = $const['categories'];
?>

<div class="san-pham-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quy_cach')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loaisanpham_id')->dropDownList(ArrayHelper::map($categories['loaisanpham'],'id',function($e){
        return $e->ten . ' - ' . $e->nhomsanpham->ten;
    }),['prompt' => 'Chọn loại sản phẩm']) ?>

    <?= $form->field($model, 'hangsanxuat_id')->dropDownList(ArrayHelper::map($categories['hangsanxuat'],'id','ten'),['prompt' => 'Chọn hãng sản xuất']) ?>

    <?= $form->field($model, 'ghi_chu')->textInput(['maxlength' => true]) ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

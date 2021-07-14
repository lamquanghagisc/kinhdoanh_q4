<?php
use kartik\form\ActiveForm;

?>
<div class="kho-san-pham-delete-form">
    <?php $form = ActiveForm::begin(); ?>
    <h5>Xóa sản phẩm "<?=$model->sanpham->ten?>" khỏi kho?</h5>
    <?php if (!Yii::$app->request->isAjax){ ?>
        <div class="form-group">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end()?>
</div>

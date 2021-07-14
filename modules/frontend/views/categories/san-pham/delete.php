<?php

use kartik\form\ActiveForm;

?>
<div class="san-pham-delete-form">
    <?php $form = ActiveForm::begin(); ?>
    <h4>Xóa Sản phẩm "<?= $model->ten ?>"?</h4>
    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= \yii\helpers\Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>
    <?php ActiveForm::end() ?>
</div>

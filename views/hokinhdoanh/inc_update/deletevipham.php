<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 9/7/2017
 * Time: 4:30 PM
 */
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;
?>
<?php
$form = ActiveForm::begin([
            'id' => 'delete-vipham',
            'enableClientValidation' => true, 'enableAjaxValidation' => false,
        ])
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'Xoá thông tin vi phạm') ?></h4>
</div>
<div class="modal-body">
    <div><h3>Bạn có chắc chắn muốn xóa?</h3></div>
    <?= $form->field($model['vipham'], 'id_ttvp')->hiddenInput()->label(FALSE) ?>
</div>
<div style="clear: both"></div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Đóng</button>
    <button type="submit" class="btn btn-warning pull-left">Xoá</button>
</div>

<?php ActiveForm::end() ?>

<script>
    $('#delete-vipham').on('submit', function (e) {
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('hokinhdoanh/deletevipham?id=') . $model['vipham']->id_ttvp ?>',
            type: 'POST',
            data: formData,
            success: function (data) {
                reloadTable('#viphamTab', '<?= Yii::$app->urlManager->createUrl('hokinhdoanh/vipham?id=') . $model['vipham']->hkd_id ?>');
                $('#ajaxModalVipham').remove();
                $('.modal-backdrop').remove();
            },
            error: function () {
                alert("Xin lỗi, đã xảy ra lỗi trong quá trình thực hiện, vui lòng kiểm tra lại");
            }
        });
    }).on('submit', function (e) {
        e.preventDefault();
        return false;
    });
</script>

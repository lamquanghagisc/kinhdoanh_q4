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
            'id' => 'update-vipham',
            'enableClientValidation' => true, 'enableAjaxValidation' => false,
        ])
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?= Yii::t('app', 'Cập nhật thông tin vi phạm') ?></h4>
</div>
<div class="modal-body">
     <div class="col-lg-6">
        <?= $form->field($model['vipham'], 'bienban_so')->input('text')->label('Số biên bản') ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($model['vipham'], 'ngay_lap')->input('date')->label('Ngày lập') ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($model['vipham'], 'donvi_lap')->input('text')->label('Đơn vị lập') ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($model['vipham'], 'quyetdinh_so')->input('text')->label('Quyết định số') ?>
    </div>
    <div class="col-lg-6">
        <?= $form->field($model['vipham'], 'quyetdinh_ngay')->input('date')->label('Quyết định ngày'); ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($model['vipham'], 'donvi_qd')->input('text')->label('Đơn vị ra QĐ') ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($model['vipham'], 'noidung_vipham')->textarea()->label('Nội dung vi phạm') ?>
    </div>
    <div class="col-lg-12">
        <?= $form->field($model['vipham'], 'hinhthuc_phat')->textarea()->label('Hình thức xử phạt') ?>
    </div>
   </div>
 <div style="clear: both"></div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Đóng</button>
    <button type="submit" class="btn btn-warning pull-left">Cập nhật</button>
</div>

<?php ActiveForm::end() ?>

<script>
    $('#update-vipham').on('submit', function (e) {
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: '<?= Yii::$app->urlManager->createUrl('hokinhdoanh/updatevipham?id=') . $model['vipham']->id_ttvp ?>',
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

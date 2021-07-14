<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 8/29/2018
 * Time: 9:32 AM
 */
use kartik\form\ActiveForm;
use \yii\captcha\Captcha;
use yii\helpers\Html;
?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Đổi mật khẩu</span>
    </li>
</ul>
<?php $form = ActiveForm::begin() ?>
<div class="row">
    
    <?php $error = Yii::$app->session->getFlash('error_password') ?>
    <?php if (isset($error)): ?>
        <div class="portlet box red" id="notice">
            <div class="portlet-title">
                <div class="caption"><span class="fa fa-check-circle-o"></span> Mật khẩu cũ không đúng!</div>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-lg-6 col-lg-offset-3">
        <div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i> Đổi mật khẩu
                    </div>
                </div>
                <div class="portlet-body">
                    <?= $form->field($model, 'password')->input('password')->label('Mật khẩu cũ') ?>
                    <?= $form->field($model, 'newpassword')->input('password')->label('Mật khẩu mới') ?>
                    <?= $form->field($model, 'confirm')->input('password')->label('Nhập lại mật khẩu mới') ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className())->label('Mã xác thực') ?>
                    <div class="text-center">
                        <?= Html::submitButton('Đổi mật khẩu', ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
ActiveForm::end()?>
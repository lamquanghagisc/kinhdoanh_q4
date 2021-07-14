<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 1/28/2021
 * Time: 11:12 AM
 */

use kartik\form\ActiveForm;

?>
<div class="row no-gutters justify-content-center bg-primary-dark-op">
    <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
        <div class="block block-transparent block-rounded w-100 overflow-hidden block-themed">
            <div class="block-header">
                <img src="<?= Yii::$app->homeUrl ?>resources/img/layout4/logo_q1.png" alt="logo" width="200px" style="display: block; margin-left: auto; margin-right: auto;">
            </div>
            <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">

                <?php $form = ActiveForm::begin(['options' => ['class' => '']]) ?>
                <?= $form->field($model, 'ten_dang_nhap')->input('text')->label('Tên đăng nhập') ?>

                <?= $form->field($model, 'mat_khau')->input('password')->label('Mật khẩu') ?>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-hero-primary">
                        Đăng nhập
                    </button>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>



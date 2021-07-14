<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/4/2021
 * Time: 11:21 AM
 */
use kartik\form\ActiveForm;
use yii\helpers\Html;

$this->title = 'Liên hệ';
?>

<div class="content content-full">
    <div class="row">
        <div class="col-lg-6">
            <div class="block block-themed">
                <div class="block-header">
                    <h3 class="block-title">Liên hệ</h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <?php $form = ActiveForm::begin()?>
                            <?= $form->field($model,'name')->textInput()?>

                            <?= $form->field($model,'phone')->textInput()?>

                            <?= $form->field($model,'email')->input('email')?>

                            <?= $form->field($model,'subject')->textInput()?>

                            <?= $form->field($model,'body')->textarea()?>

                            <?= Html::submitButton('Gửi',['class' => 'btn btn-primary'])?>
                            <?php ActiveForm::end()?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="block block-themed">
                <div class="block-header">
                    <h3 class="block-title">Địa chỉ</h3>
                </div>
                <div class="block-content">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7399.189625009494!2d106.70418226641026!3d10.766494223818032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf086c41574b0c109!2zVUJORCBRdeG6rW4gNA!5e0!3m2!1svi!2s!4v1622799227708!5m2!1svi!2s" width="520" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="form-group">
                        <p class="h3 text-uppercase">Ủy ban nhân dân quận 4 thành phố hồ chí minh</p>
                        <address>
                            <span class="fa fa-map-marker"></span> Số 18 Đoàn Như Hài<br>
                            Phường 13, Quận 4, Thành phố Hồ Chí Minh<br>
                            <span class="fa fa-phone"></span> (8428) 39400437<br>
                            <span class="fa fa-fax"></span> (8428) 39400064<br>
                            <span class="fa fa-envelope"></span> q4@tphcm.gov.vn
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

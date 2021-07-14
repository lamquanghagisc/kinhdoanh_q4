<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 7/31/2017
 * Time: 3:07 PM
 */
use johnitvn\ajaxcrud\CrudAsset;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

CrudAsset::register($this);
?>
<div class="page-content-inner" >

    <div class="col-lg-12">
        <div class="portlet box">
            <div class="portlet-title bg-primary">
                <div class="caption">
                    <span><i class="fa fa-search"></i> Tìm kiếm Văn phòng cho thuê</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php $form = ActiveForm::begin() ?>
                <div class="col-lg-6">
                    <?= $form->field($model['search'], 'ten_vanphong', ['inputOptions' => ['autofocus' => 'autofocus']])->input('text')->label('Tên văn phòng') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model['search'], 'chu_dau_tu')->input('text')->label('Chủ đầu tư') ?>
                </div>
              
                <div class="col-lg-4">
                    <?= $form->field($model['search'], 'so_nha')->input('text')->label('Số nhà') ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($model['search'], 'ten_duong')->dropDownList(ArrayHelper::map($model['giaothong'], 'tenduong', 'tenduong'), ['prompt' => 'Chọn đường'])->label('Tên đường') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model['search'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'), ['prompt' => 'Chọn phường'])->label('Tên phường') ?>
                </div>
                <div class="col-lg-12 form-group"> 
                    <a style="margin-left: 5px" id="btn_cancle" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-refresh"></span></a>
                    <button type="submit" id="cgsearch_btn" class="btn btn-info pull-right">Tìm kiếm</button>
                </div>
                <?php if (isset($dataProvider)): ?>
                    <div class="col-lg-12">
                        <?=
                        GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => require(__DIR__ . '/_result.php'),
                            'toolbar' => [
                            ],
                            'panel' => [
                                'heading' => '<h3 class="panel-title"></h3>',
                                'type' => 'danger',
                            ],
                        ])
                        ?>
                    </div>
                <?php endif; ?>
                <div style="clear: both"></div>

                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#btn_cancle").click(function () {
            $(this).closest('form').find("input[type=text], textarea,input[type=date]").val("");
        });

    });
</script>
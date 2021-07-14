<?php

use app\models\HoKinhDoanhSearch;
use johnitvn\ajaxcrud\CrudAsset;
use kartik\file\FileInput;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $searchModel HoKinhDoanhSearch */
/* @var $dataProvider ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
?>
<?php $import = Yii::$app->session->getFlash('hkd_import_success') ?>
<?php if (isset($import)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span><?= ' Đã cập nhật: '. $countUp. ' (đối tượng) <br>' .'<span class="fa fa-check-circle-o"></span> Đã thêm mới: ' .$countIn. ' (đối tượng)' ?></div>
        </div>
    </div>
<?php endif; ?>
<?php $im = Yii::$app->session->getFlash('hkd_import_unsuccess') ?>
<?php if (isset($im)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Cập nhật dữ liệu không thành công!</div>
        </div>
    </div>
<?php endif; ?>
<div class="col-lg-12">
    <div class="portlet box blue-steel">
        <div class="portlet-title">
            <div class="caption">
                <span class="">Read excel</span>
            </div>
        </div>
        <div class="portlet-body">
            <?php
            $form = ActiveForm::begin([
                        'options' => ['enctype' => 'multipart/form-data']
                    ])
            ?>
            <?=
            $form->field($model, 'file')->widget(FileInput::className(), [
            ])
            ?>
            <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Import</button>
            <a class="btn btn-primary" href="<?= Yii::$app->urlManager->createUrl('/uploads/file/import/CAPNHAT_DULIEU_HKD_Q4.xlsx') ?>" class="nav-link ">
                <i class="fa fa-download"></i>
                            <span class="title"> File mẫu</span>
            </a>
            <?php ActiveForm::end() ?>
        </div>
    </div>
    <div id="ajaxCrudDatatable">
        <?=
        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'pjax' => FALSE,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'ten_hkd',
                'so_giayphep',
                'so_nha',
            ],
        ])
        ?>
    </div>
</div>

<?php
Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php Modal::end(); ?>

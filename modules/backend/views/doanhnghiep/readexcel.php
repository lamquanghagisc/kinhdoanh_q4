<?php

use app\models\HoKinhDoanhSearch;
use app\modules\DCrud\DCrudAsset;
use app\modules\DCrud\grid\GridView;
use kartik\file\FileInput;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $searchModel HoKinhDoanhSearch */
/* @var $dataProvider ActiveDataProvider */


DCrudAsset::register($this);
$this->title = (isset($const['title'])) ? $const['title'] : 'Import dữ liệu Doanh nghiệp';
$this->params['breadcrumbs'][] = ['label' => 'Doanh nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $import = Yii::$app->session->getFlash('dn_import_success') ?>
<?php if (isset($import)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span><?= ' Đã cập nhật: ' . $countUp . ' (đối tượng) <br>' . '<span class="fa fa-check-circle-o"></span> Đã thêm mới: ' . $countIn . ' (đối tượng)' ?></div>
        </div>
    </div>
<?php endif; ?>
<?php $im = Yii::$app->session->getFlash('dn_import_unsuccess') ?>
<?php if (isset($im)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Cập nhật dữ liệu không thành công!</div>
        </div>
    </div>
<?php endif; ?>
<div class="block block-themed">
    <div class="block-header">
        <h3 class="block-title text-uppercase">
            <?= $this->title ?>
        </h3>
    </div>
    <div class="col-lg-12">

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
        <a class="btn btn-primary" href="<?= Yii::$app->urlManager->createUrl('/uploads/file/import/CAPNHAT_DULIEU_Q4.xlsx') ?>" class="nav-link ">
            <i class="fa fa-download"></i>
            <span class="title"> File mẫu</span>
        </a>
        <?php ActiveForm::end() ?>
    </div>
    <div class="block-content padding-tb-05">
        <div id="ajaxCrudDatatable">
            <?=
            GridView::widget([
                'id' => 'crud-datatable',
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'pjax' => FALSE,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'ten_dn',
                    'so_giayphep',
                    'so_nha',
                ],
            ])
            ?>
        </div>
    </div>
</div>


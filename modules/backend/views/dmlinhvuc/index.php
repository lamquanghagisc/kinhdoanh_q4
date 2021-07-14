<?php

use app\models\DmLinhvucSearch;
use app\modules\DCrud\DCrudAsset;
use app\modules\DCrud\grid\GridView;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel DmLinhvucSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Danh mục Lĩnh vực';
$this->params['breadcrumbs'][] = $this->title;

DCrudAsset::register($this);
?>
<div class="dm-linhvuc-index">
    <div id="ajaxCrudDatatable">
        <?=
        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                ['content' =>
                    Html::a('Thêm mới', ['create'], ['role' => 'modal-remote', 'title' => 'Thêm mới', 'class' => 'btn btn-success']) .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panelPrefix' => 'block ',
            'toolbarContainerOptions' => ['class' => 'float-right'],
            'summaryOptions' => ['class' => 'float-right'],
            'panel' => [
                'type' => 'block-themed',
                'headingOptions' => ['class' => 'block-header'],
                'summaryOptions' => ['class' => 'block-options'],
                'titleOptions' => ['class' => 'block-title'],
                'heading' => '<i class="glyphicon glyphicon-list"></i> Danh mục Lĩnh vực',
                'after' => false,
            ]
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

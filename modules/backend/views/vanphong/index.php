<?php

use app\models\VanPhongSearch;
use app\modules\DCrud\DCrudAsset;
use app\modules\DCrud\grid\GridView;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel VanPhongSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Văn phòng cho thuê';
$this->params['breadcrumbs'][] = $this->title;

DCrudAsset::register($this);
?>

<div class="van-phong-index">
    <div id="ajaxCrudDatatable">
         <?=
        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                ['content' =>
                    Html::a('<i class="fa fa-plus"></i> Thêm mới', Yii::$app->urlManager->createUrl(['admin/vanphong/create']), ['class' => 'btn btn-success', 'title' => 'Thêm mới']) .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'responsiveWrap' => false,
            'panelPrefix' => 'block ',
            'toolbarContainerOptions' => ['class' => 'float-right'],
            'summaryOptions' => ['class' => 'float-right'],
            'panel' => [
                'type' => 'block-themed',
                'headingOptions' => ['class' => 'block-header'] ,
                'summaryOptions' => ['class' => 'block-options'],
                'titleOptions' => ['class' => 'block-title'] ,
                'heading' => '<i class="fa fa-list"></i> Danh sách Văn phòng cho thuê',
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

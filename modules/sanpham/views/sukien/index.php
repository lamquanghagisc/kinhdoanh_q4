<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\modules\DCrud\DCrudAsset;
use app\modules\DCrud\grid\GridView;
use app\modules\DCrud\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuKienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = (isset($const['title'])) ? $const['title'] : 'Sự kiện';
$this->params['breadcrumbs'][] = $this->title;

DCrudAsset::register($this);

?>
<div class="row">
    <div class="col-md-12">
        <div class="san-pham-index">
        <div id="ajaxCrudDatatable">
        <?php $fullExportMenu = ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $searchModel->getExportColumns($categories,$const),
            'target' => ExportMenu::TARGET_BLANK,
            'pjaxContainerId' => 'kv-pjax-container',
            'exportContainer' => [
                'class' => 'btn-group mr-2'
            ],
            'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_EXCEL => false,
                ExportMenu::FORMAT_PDF => false,
            ],
            'columnSelectorOptions' => ['class' => 'btn btn-outline-info','label' => 'Chọn cột'],
            'dropdownOptions' => [
                'label' => 'XUẤT FILE',
                'class' => 'btn btn-info',
                'itemsBefore' => [
                    '<div class="dropdown-header">Xuất tất cả dữ liệu</div>',
                ],
            ],
        ]) ?>
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => $searchModel->getGridColumns($categories,$const,$searchModel),
            'toolbar'=> [
                $fullExportMenu,
                ['content'=>$const['buttons']['create'],
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => false,
            'panelPrefix' => 'block ',
            'toolbarContainerOptions' => ['class' => 'float-right'],
            'summaryOptions' => ['class' => 'float-right'],
            'panel' => [
                'type' => 'block-themed',
                'headingOptions' => ['class' => 'block-header'] ,
                'summaryOptions' => ['class' => 'block-options'],
                'titleOptions' => ['class' => 'block-title'] ,
                'heading' => '<i class="fa fa-list"></i> ' .  $this->title ,
            ]
        ])?>
    </div>
        </div>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

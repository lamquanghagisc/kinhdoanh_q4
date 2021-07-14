<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/3/2021
 * Time: 2:17 PM
 */

use app\modules\DCrud\DCrudAsset;
use app\modules\DCrud\grid\GridView;
use yii\helpers\Html;
use yii\bootstrap\Modal;

DCrudAsset::register($this);
$this->title = 'Tồn kho';
$this->params['breadcrumbs'][] = $this->title;
?>



<?= GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'pjax' => true,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '30px',
        ],
        [
            'attribute' => 'sp',
        ],
        [
            'attribute' => 'hsx',
        ],
        [
            'attribute' => 'so_luong',
            'label' => 'Số lượng',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::a($model->so_luong, ['kho/detail','id' => $model->id], ['class' => 'btn btn-outline-info btn-sm', 'role' => 'modal-remote']);
            }
        ],
    ],
    'toolbar' => [
        ['content' =>
            Html::a('<i class="fa fa-plus"></i> Thêm mới', ['kho/create'],
                ['role' => 'modal-remote', 'title' => 'Thêm mới Đơn hàng', 'class' => 'btn btn-success'])
        ],
    ],
    'striped' => true,
    'condensed' => true,
    'responsive' => false,
    'panelPrefix' => 'block ',
    'summaryOptions' => ['class' => 'float-right'],
    'panel' => [
        'type' => 'block-themed',
        'headingOptions' => ['class' => 'block-header'],
        'summaryOptions' => ['class' => ''],
        'titleOptions' => ['class' => 'block-title'],
        'heading' => $this->title,
    ]
]) ?>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    'size' => Modal::SIZE_LARGE,
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>

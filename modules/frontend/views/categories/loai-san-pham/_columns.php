<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\modules\DCrud\grid\GridView;

$categories = $const['categories'];

return [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nhomsanpham_id',
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map($categories['nhomsanpham'],'id','ten'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'value' => function($model){
            return ($model->nhomsanpham != null) ? $model->nhomsanpham->ten : '';
        },
        'format' => 'raw',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ghi_chu',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'width' => '180px',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a('<span class="fa fa-info"></span>',$url,['class' => 'btn btn-info','role' => 'modal-remote','title'=>'Xem']);
            },
            'update' => function ($url, $model, $key) {
                return Html::a('<span class="fa fa-pen"></span>',$url,['class' => 'btn btn-warning','role' => 'modal-remote','title'=>'Cập nhật']);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a('<span class="fa fa-trash"></span>',$url,['class' => 'btn btn-danger','role' => 'modal-remote','title'=>'Xóa']);
            },
        ],
    ],

];   
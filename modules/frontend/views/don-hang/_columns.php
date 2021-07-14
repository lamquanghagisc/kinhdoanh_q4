<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\modules\DCrud\grid\GridView;

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
        'attribute'=>'khachhang_id',
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map(\app\modules\backend\models\KhachHang::findAll('1=1'),'id','ten'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'format' => 'raw',
        'value' => function($model){
            return $model->khachhang->ten . ' - ' . '<b>['.$model->khachhang->dia_chi.']</b>';
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngay_ban',
        'value' => function($model){
            return date('d-m-Y', strtotime($model->ngay_ban));
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tong_so_tien',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'width' => '200px',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'template' => '{view} {detail} {update} {delete}',
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a('<span class="fa fa-info"></span>',$url,['class' => 'btn btn-info btn-sm','role' => 'modal-remote','title'=>'Xem']);
            },
            'detail' => function ($url, $model, $key) {
                return Html::a('<span class="fa fa-list"></span>',$url,['class' => 'btn btn-success btn-sm','title'=>'Chi tiết','data-pjax' => 0]);
            },
            'update' => function ($url, $model, $key) {
                return Html::a('<span class="fa fa-pen"></span>',$url,['class' => 'btn btn-warning btn-sm','role' => 'modal-remote','title'=>'Cập nhật']);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a('<span class="fa fa-trash"></span>',$url,['class' => 'btn btn-danger btn-sm','role' => 'modal-remote','title'=>'Xóa']);
            },
        ],
    ],

];   
<?php
use yii\helpers\Url;

return [
    
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
//        [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'id_tintuc',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tieu_de',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'duong_dan',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'noi_dung',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
         'template' => '{view} {update}',
        'header' => 'Thao tác',
        'width' => '140px',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>[
            'role'=>'modal-remote',
            'title'=>'Chi tiết',
            'data-toggle'=>'tooltip',
            'class' =>'btn btn-xs btn-info'
        ],
        'updateOptions'=>[
            'role'=>'modal-remote',
            'title'=>'Cập nhật', 
            'data-toggle'=>'tooltip',
            'class' =>'btn btn-xs btn-warning'
        ],
//        'deleteOptions'=>[
//            'role'=>'modal-remote',
//            'title'=>'Xóa',
//            'class' => 'btn btn-xs btn-danger',
//            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
//            'data-request-method'=>'post',
//            'data-toggle'=>'tooltip',
//            'data-confirm-title'=>'Xóa danh mục',
//            'data-confirm-message'=>'Bạn chắc chắn muốn xóa danh mục này?',
//        ], 
    ],

];   
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
        'attribute'=>'sanpham_id',
        'filterType' => GridView::FILTER_SELECT2,
        'filter' => ArrayHelper::map(\app\modules\backend\models\categories\SanPham::findAll(['status' => 1]),'id','ten'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => ''],
        'format' => 'raw',
        'value' => function($model){
            return $model->sanpham->ten . ' - ' . '<b>['.$model->sanpham->hangsanxuat_ten.']</b>';
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ngay_nhap_kho',
        'value' => function($model){
            return is_null($model->ngay_nhap_kho) ? null : date('d-m-Y', strtotime($model->ngay_nhap_kho));
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'gia_mua_vnd',
        'value' => function($model){
            return number_format($model->gia_mua_vnd,0,'.',',');
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'gia_mua_aud',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'nguoi_nhap_kho',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ngay_het_han',
    // ],
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
<?php

use app\models\DmLoaicuahang;
use app\models\RanhPhuong;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'contentOptions' => function ($model, $key, $index, $column) {
            return ['style' => 'color:'
                . ($model->geom == NULL ? 'red' : '')];
        },
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ten_vanphong',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'so_nha',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ten_duong',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ten_phuong',
                'format' => 'html',
                'value' => function($model) {
                    return $model->ten_phuong;
                },
                'filter' => ArrayHelper::map(RanhPhuong::find()->all(), 'tenphuong', 'tenphuong')
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'chu_dau_tu',
            ],
            [

                'attribute' => 'dien_thoai',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
          
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'dien_tich',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'header' => 'Thao tác',
                'width' => '120px',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'id' => $key]);
                },
                        'viewOptions' => ['title' => 'Chi tiết', 'data-toggle' => 'tooltip', 'class' => 'btn btn-xs btn-info', 'style' => ['margin' => 0]],
                        'updateOptions' => ['title' => 'Cập nhật', 'data-toggle' => 'tooltip', 'class' => 'btn btn-xs btn-warning', 'style' => ['margin' => 0]],
                        'deleteOptions' => [
                            'role' => 'modal-remote',
                            'title' => 'Xóa',
                            'class' => 'btn btn-xs btn-danger',
                            'data-confirm' => false, 'data-method' => false, // for overide yii data api
                            'data-request-method' => 'post',
                            'data-toggle' => 'tooltip',
                            'data-confirm-title' => 'Bạn có chắc chắn?',
                            'data-confirm-message' => 'Xoá thông tin?',
                            'data-confirm-ok' => 'Xóa',
                            'data-confirm-cancel' => 'Đóng',
                        ],
                    ],
                ];
                
<?php

use app\models\RanhPhuong;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
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
                'attribute' => 'ten_diemgiuxe',
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
                'width' => '180px',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'id' => $key]);
                },
                        'buttons' => [
                            'view' => function($url, $model) {
                                return Html::a("<span class='fa fa-eye'></span>", $url, ['class' => 'btn btn-info btn-sm', 'data-pjax' => 0]);
                            },
                                    'update' => function($url, $model) {
                                return Html::a("<span class='fa fa-pen'></span>", $url, ['class' => 'btn btn-warning btn-sm', 'data-pjax' => 0]);
                            },
                                    'delete' => function($url, $model) {
                                return Html::a("<span class='fa fa-trash'></span>", $url, ['class' => 'btn btn-danger btn-sm', 'role' => 'modal-remote']);
                            },
                                ],
                            ],
                        ];
                        
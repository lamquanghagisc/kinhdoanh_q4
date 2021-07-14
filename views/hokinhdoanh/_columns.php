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
                'attribute' => 'ten_hkd',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'linhvuc_id',
                'label' => 'Lĩnh vực',
                'format' => 'html',
                'value' => function($model) {
                    return $model->ten_linhvuc;
                },
                'filter' => ArrayHelper::map(app\models\DmLinhvuc::find()->all(), 'id_linhvuc', 'ten_linhvuc')
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'so_giayphep',
                'label' => 'Giấy phép',
                'format' => 'raw',
                'value' => function($model) {
                    return 'Số: ' . $model->so_giayphep . '<br>' . 'Ngày cấp: ' . (($model->ngaycap_giayphep != null) ? date('d-m-Y', strtotime($model->ngaycap_giayphep)) : '');
                }
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
                'attribute' => 'nguoi_daidien',
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
                'attribute' => 'fax',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'email',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'nganh_kd',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'website',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'von_kd',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'gioi_tinh',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'dan_toc',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ngay_sinh',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
                'value' => function($model) {
            return (($model->ngay_sinh != null) ? date('d-m-Y', strtotime($model->ngay_sinh)) : '');
        }
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'quoc_tich',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'so_cmnd',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ngay_cap',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
                'value' => function($model) {
            return (($model->ngay_cap != null) ? date('d-m-Y', strtotime($model->ngay_cap)) : '');
        }
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'noi_cap',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'hokhau_thuongtru',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'noisong_hientai',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
//            [
//                'class' => '\kartik\grid\DataColumn',
//                'attribute' => 'so_giayphep',
//            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ghi_chu',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'tinhtrang_hd',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
//            [
//                'class' => '\kartik\grid\DataColumn',
//                'attribute' => 'geom',
//            ],
//            [
//                'class' => '\kartik\grid\DataColumn',
//                'attribute' => 'id_nn',
//            ],
//            [
//                'class' => '\kartik\grid\DataColumn',
//                'attribute' => 'ngaycap_giayphep',
//            ],
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
                
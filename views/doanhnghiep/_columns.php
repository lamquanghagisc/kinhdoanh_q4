<?php

use app\models\DmLoaihinhdn;
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
                'attribute' => 'ten_dn',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model->ten_dn == null) ? '(Chưa có)' : $model->ten_dn;
                },
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'loaihinhdn_id',
                'label' => 'Loại hình DN',
                'format' => 'html',
                'value' => function($model) {
                    return $model->ten_loai;
                },
                'filter' => ArrayHelper::map(DmLoaihinhdn::find()->all(), 'id_loaihinhdn', 'ten_loai')
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'so_giayphep',
                'format' => 'raw',
                'value' => function($model) {
                    return 'Số: ' . $model->so_giayphep . '<br>' . 'Ngày cấp: ' . (($model->ngaycap_giayphep != null) ? date('d-m-Y', strtotime($model->ngaycap_giayphep)) : '') .
                            (($model->ngay_thaydoi != null) ? '<br>' . 'Ngày cấp đổi: ' . date('d-m-Y', strtotime($model->ngay_thaydoi)) : '');
                }
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
                'attribute' => 'dien_thoai',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ma_nganh',
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
                'attribute' => 'so_laodong',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'tinhtrang_thue',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'phuong_rasoat',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'quanly_thue',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'loaihinh_kinhte',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'thanh_vien',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ten_loaihinh',
                'vAlign' => 'middle',
                'headerOptions' => ['class' => 'kv-sticky-column'],
                'contentOptions' => ['class' => 'kv-sticky-column'],
                'hidden' => true,
                'format' => 'text',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'tinhtrang_hd',
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
                
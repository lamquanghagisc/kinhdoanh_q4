<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/9/2021
 * Time: 9:48 AM
 */
use yii\widgets\DetailView;
?>

<?=
DetailView::widget([
    'options' => ['class' => 'table table-bordered table-td-padding-015'],
    'model' => $model,
    'attributes' => [
        'ten_hkd',
        [
            'label' => 'Địa diểm kinh doanh',
            'value' => (($model->vi_tri == NULL) ? '' : $model->vi_tri . ', ') . (($model->so_nha == NULL) ? '' : $model->so_nha . ', ') . (($model->ten_duong == NULL) ? '' : $model->ten_duong . ', ') . (($model->ten_phuong == NULL) ? '' : $model->ten_phuong),
        ],
        'ma_nganh',
        'ten_linhvuc',
        'so_giayphep',
        [
            'attribute' => 'ngaycap_giayphep',
            'format' => ['date', 'php:d-m-Y'],
        ],
        'dien_thoai',
        'nganh_kd',
        [
            'attribute' => 'von_kd',
            'value' => number_format($model->von_kd, 0, ',', ','),
        ],
        'nguoi_daidien',
        [                      // the owner name of the model
            'attribute' => 'ngay_sinh',
            'format' => ['date', 'php:d-m-Y'],
            //  'value' => date('d-m-Y', strtotime($model->ngay_sinh)),
        ],
        'dan_toc',
        'quoc_tich',
        'so_cmnd',
        [                      // the owner name of the model
            'attribute' => 'ngay_cap',
            'format' => ['date', 'php:d-m-Y'],
            //  'value' => date('d-m-Y', strtotime($model->ngay_cap)),
        ],
        'noi_cap',
        [
            'label' => 'Giới Tính',
            'value' => ($model->gioi_tinh == null) ? '' : (($model->gioi_tinh == 1) ? 'Nam' : 'Nữ'),
        ],
        'hokhau_thuongtru',
        'noisong_hientai',
        'tinhtrang_hd'
    ],
])
?>

<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\KhoSanPham */
?>
<div class="kho-san-pham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sanpham_id',
            'ngay_nhap_kho',
            'ngay_xuat_kho',
            'gia_mua_vnd',
            'gia_mua_aud',
            'nguoi_nhap_kho',
            'ngay_het_han',
        ],
    ]) ?>

</div>

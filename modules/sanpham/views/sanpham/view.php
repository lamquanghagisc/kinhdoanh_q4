<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SanPham */
?>
<div class="san-pham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_san_pham',
            'slug',
            'tom_tat',
            'mo_ta:ntext',
            'thoi_gian_dang',
            'anh_dai_dien',
            'noi_bat',
            'thoi_gian_sua',
            'nganhnghe_id',
            'taikhoan_id',
        ],
    ]) ?>

</div>

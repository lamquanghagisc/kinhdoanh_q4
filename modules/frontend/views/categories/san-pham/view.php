<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\SanPham */
?>
<div class="san-pham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghi_chu',
            'hangsanxuat_id',
            'loaisanpham_id',
            'status',
            'quy_cach',
        ],
    ]) ?>

</div>

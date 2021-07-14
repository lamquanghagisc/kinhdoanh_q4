<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\LoaiSanPham */
?>
<div class="loai-san-pham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghi_chu',
            'nhomsanpham_id',
        ],
    ]) ?>

</div>

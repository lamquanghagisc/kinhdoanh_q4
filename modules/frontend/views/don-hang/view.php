<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\DonHang */
?>
<div class="don-hang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'khachhang_id',
            'ngay_ban',
            'tong_so_tien',
        ],
    ]) ?>

</div>

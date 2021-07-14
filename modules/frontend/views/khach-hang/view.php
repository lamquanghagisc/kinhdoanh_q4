<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\KhachHang */
?>
<div class="khach-hang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'dien_thoai',
            'facebook',
            'dia_chi',
            'ghi_chu',
        ],
    ]) ?>

</div>

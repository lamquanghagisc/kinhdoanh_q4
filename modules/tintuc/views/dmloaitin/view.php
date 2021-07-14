<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DmLoaitin */
?>
<div class="dm-loaitin-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_loai',
        ],
    ]) ?>

</div>

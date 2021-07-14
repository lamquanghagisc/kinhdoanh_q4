<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\NhomSanPham */
?>
<div class="nhom-san-pham-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghi_chu',
            'status',
        ],
    ]) ?>

</div>

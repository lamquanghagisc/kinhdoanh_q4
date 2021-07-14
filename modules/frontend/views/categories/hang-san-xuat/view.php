<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\HangSanXuat */
?>
<div class="hang-san-xuat-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten',
            'ghi_chu',
        ],
    ]) ?>

</div>

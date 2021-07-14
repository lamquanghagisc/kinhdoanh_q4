<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DmLinhvuc */
?>
<div class="dm-linhvuc-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_linhvuc',
            'ten_linhvuc',
            'ghi_chu:ntext',
        ],
    ]) ?>

</div>

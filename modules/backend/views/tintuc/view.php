<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TinTuc */
?>
<div class="tin-tuc-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       
            'tieu_de',
            'duong_dan',
            'noi_dung:ntext',
        ],
    ]) ?>

</div>

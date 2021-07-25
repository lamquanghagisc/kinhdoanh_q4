<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
?>
<div class="video-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tieu_de',
            'tom_tat',
            'alias_title',
            'ten_video',
            'loaitin_id',
            'taikhoan_id',
            'thoi_gian_dang',
        ],
    ]) ?>

</div>

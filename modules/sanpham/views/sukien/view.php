<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SuKien */
?>
<div class="su-kien-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ten_su_kien',
            'tom_tat',
            'mo_ta',
            'slug',
            'thoi_gian_dang',
            'thoi_gian_bat_dau',
            'thoi_gian_ket_thuc',
            'anh_dai_dien',
            'noi_bat',
            'nganhnghe_id',
            'taikhoan_id',
            'dia_diem',
        ],
    ]) ?>

</div>

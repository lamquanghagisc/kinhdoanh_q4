<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\LoaiSanPham */
?>
<div class="loai-san-pham-update">

    <?= $this->render('_form', [
        'model' => $model,
        'const' => $const,
    ]) ?>

</div>

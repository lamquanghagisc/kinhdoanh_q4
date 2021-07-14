<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\KhachHang */
?>
<div class="khach-hang-update">

    <?= $this->render('_form', [
        'model' => $model,
        'const' => $const,
    ]) ?>

</div>

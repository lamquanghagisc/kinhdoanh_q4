<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\DonHang */

?>
<div class="don-hang-create">
    <?= $this->render('_form', [
        'model' => $model,
        'const' => $const,
    ]) ?>
</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\KhoSanPham */

?>
<div class="kho-san-pham-create">
    <?= $this->render('_form', [
        'model' => $model,
        'const' => $const,
    ]) ?>
</div>

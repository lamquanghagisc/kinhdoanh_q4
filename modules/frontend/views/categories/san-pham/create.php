<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\backend\models\categories\SanPham */

?>
<div class="san-pham-create">
    <?= $this->render('_form', [
        'model' => $model,
        'const' => $const,
    ]) ?>
</div>

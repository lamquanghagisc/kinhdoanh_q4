<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TinTuc */

?>
<div class="tin-tuc-create">
    <?= $this->render('_form', [
        'model' => $model,
        'const' => $const,
        'categories' => $categories,
    ]) ?>
</div>

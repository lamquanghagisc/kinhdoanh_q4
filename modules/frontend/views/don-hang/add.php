<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/3/2021
 * Time: 10:09 AM
 */

use kartik\form\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
?>

<?php $form = ActiveForm::begin()?>

<?= $form->field($model,'kho_id')->widget(Select2::class,[
//    'data' => $data,
    'options' => ['placeholder' => ''],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 3,
        'language' => [
            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
        ],
        'ajax' => [
            'url' => Url::to(['kho/list']),
            'dataType' => 'json',
            'data' => new JsExpression('function(params) { return {q:params.term}; }')
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('function(item) { return item.text + " ("+item.quy_cach +")" + " - " + item.loaisanpham_ten + " - <b>[" + item.hangsanxuat_ten + "]</b>" ; }'),
        'templateSelection' => new JsExpression('function (item) { if(item.id == "" || typeof(item.loaisanpham_ten) == "undefined" || typeof(item.hangsanxuat_ten) == "undefined"){ return item.text;} else {return item.text + " ("+item.quy_cach +")" + " - " + item.loaisanpham_ten + " - <b>[" + item.hangsanxuat_ten + "]</b>";} }'),
    ],
])?>

<?php ActiveForm::end()?>

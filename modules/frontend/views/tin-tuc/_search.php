<?php
use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<div class="tintuc-search">
<?php $form = ActiveForm::begin([
    'action' =>['index'],
    'method' =>'get',
            ]) ?>


    

    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light">
                <!-- <div class="portlet-title">
                    <div class="caption">
                        <span class="font-blue-steel">Phân Loại tin </span>
                    </div>
                </div> -->
                <div class="portlet-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model, 'loaitin_id')
                                    ->dropDownList(ArrayHelper::map($dsloaitin, 'id', 'ten_loai'), ['prompt' => 'Chọn loại tin'])
                                     ?>
                            
                        </div>
                        
                        <div class="col-lg-12">
                           
                                <?= Html::submitButton('Search',['btn btn-success'] ) ?>                       
                            
                        </div>    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>
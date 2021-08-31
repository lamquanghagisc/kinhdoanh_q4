<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\SuKien */
/* @var $form yii\widgets\ActiveForm */
$this->title = (((isset($model['sukien']) && ($model['sukien']->id)==null)) ? $const['label']['create'] : $const['label']['update']) . ' ' . $const['title'];
$this->params['breadcrumbs'][] = ['label' => $const['label']['index'] . ' ' . $const['title'], 'url' => Yii::$app->urlManager->createUrl($const['url']['index'])];
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('sanpham/sukien') ?>">Danh sách sự kiện</a>
        <i class="fa fa-circle"></i>
    </li>
    
</ul>
<?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'skin skin-square',
                'enctype' => 'multipart/form-data'
            ]
        ]) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="font-blue-steel"><?= $this->title ?> </span>
                    </div>
                </div>
                 <!-- fields -->
                <div class="portlet-body">        
                    <div class="row">
                        <div class="col-lg-6">
                            <?= $form->field($model['sukien'], 'ten_su_kien')->textInput(['maxlength' => true]) ?>
                           
                        </div>  
                        <div class="col-lg-6">
                            <?= $form->field($model['sukien'], 'dia_diem')->textInput(['maxlength' => true]) ?>
                           
                        </div>                        
                    </div>
                    
                    <div class="row">                                                
                        <div class="col-lg-4">
                            <?= $form->field($model['sukien'], 'nganhnghe_id')->dropDownList(ArrayHelper::map($model['nganhnghe'], 'id', 'ten_nganh'), ['prompt' => 'Chọn ngành nghề'])->label('Ngành nghề') ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sukien'], 'anh_dai_dien')->FileInput() ?>
                        </div>  
                        <div class="col-lg-4">
                            <?= $form->field($model['sukien'], 'noi_bat')->checkbox() ?>
                        </div>

                    </div>
                    
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model['sukien'], 'thoi_gian_dang')->widget(DateTimePicker::classname(), [
                                            'options' => ['placeholder' => 'Thời gian đăng ...'],
                                            // 'value' => ($model['sukien']->thoi_gian_dang != null) ? date('d-m-Y H:i', strtotime($model['sanpham']->thoi_gian_dang)) : '',
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-mm-yyyy H:i',
                                                'todayHighlight' => true
                                            ]
                                        ])->label('Thời gian Đăng'); ?>
                            
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sukien'], 'thoi_gian_bat_dau')->widget(DateTimePicker::classname(), [
                                                'options' => ['placeholder' => 'Thời gian đăng ...'],
                                                // 'value' => ($model['sukien']->thoi_gian_bat_dau != null) ? date('d-m-Y', strtotime($model['sanpham']->thoi_gian_bat_dau)) : '',
                                                'pluginOptions' => [
                                                    'autoclose' => true,
                                                    'format' => 'dd-mm-yyyy H:i'
                                                ]
                                            ])->label('Thời gian bắt đầu'); ?>
                        </div>
                        <div class="col-lg-4">
                        <?= $form->field($model['sukien'], 'thoi_gian_ket_thuc')->widget(DateTimePicker::classname(), [
                                                'options' => ['placeholder' => 'Thời gian đăng ...'],
                                                // 'value' => ($model['sukien']->thoi_gian_ket_thuc != null) ? date('d-m-Y', strtotime($model['sanpham']->thoi_gian_ket_thuc)) : '',
                                                'pluginOptions' => [
                                                    'autoclose' => true,
                                                    'format' => 'dd-mm-yyyy H:i'
                                                ]
                                            ])->label('Thời gian kết thúc'); ?>
                        </div>

                    </div>
                    
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model['sukien'], 'tom_tat')->widget(TinyMce::className(), [
                                    'options' => ['rows' => 6],
                                    'language' => 'vn',
                                    'clientOptions' => [
                                        'plugins' => [
                                            "advlist autolink lists link charmap print preview anchor",
                                            "searchreplace visualblocks code fullscreen",
                                            "insertdatetime media table contextmenu paste"
                                        ],
                                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                                    ]
                                ]); 
                            ?>
                        </div>

                    </div>
                    
                    <div class="row">

                        <div class="col-lg-12">
                            <?= $form->field($model['sukien'], 'mo_ta')->widget(TinyMce::className(), [
                                    'options' => ['rows' => 10],
                                    'language' => 'vn',
                                    'clientOptions' => [
                                        'plugins' => [
                                            "advlist autolink lists link charmap print preview anchor",
                                            "searchreplace visualblocks code fullscreen",
                                            "insertdatetime media table contextmenu paste"
                                        ],
                                        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                                    ]
                                ]); 
                            ?>
                        </div>

                    </div>
                  
                </div>
                <!-- fields -->
                <div class="portlet-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (!Yii::$app->request->isAjax) { ?>
                                <div class="form-group">
                                    <?= Html::submitButton((isset($model['sukien']) &&($model['sukien']->id)==null) ? 'Thêm mới' : 'Cập nhật', ['class' => isset($model['sukien']) ? 'btn btn-success' : 'btn btn-warning']) ?>
                                    <?= $const['buttons']['back'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>


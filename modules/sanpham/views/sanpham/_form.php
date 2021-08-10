<?php
use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model app\models\SanPham */
/* @var $form yii\widgets\ActiveForm */
$this->title = (((isset($model['sanpham']) && ($model['sanpham']->id)==null)) ? $const['label']['create'] : $const['label']['update']) . ' ' . $const['title'];
$this->params['breadcrumbs'][] = ['label' => $const['label']['index'] . ' ' . $const['title'], 'url' => Yii::$app->urlManager->createUrl($const['url']['index'])];
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('sanpham/sanpham') ?>">Danh sách sản phẩm</a>
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
                            <?= $form->field($model['sanpham'], 'ten_san_pham')->textInput(['maxlength' => true]) ?>
                           
                        </div>  
                        <div class="col-lg-6">
                            <?= $form->field($model['sanpham'], 'anh_dai_dien')->FileInput() ?>
                        </div>                        
                    </div>
                    
                    <div class="row">                                                
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'gia_san_pham')->textInput() ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'so_luong')->textInput() ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'noi_bat')->checkbox() ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'nam_sx')->textInput(['maxlength' => true]) ?>                         
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'model')->textInput(['maxlength' => true])?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'hang_sx')->textInput(['maxlength' => true])?>
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'bao_hanh')->textInput(['maxlength' => true]) ?>                         
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'xuat_xu')->textInput(['maxlength' => true])?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'dat_tieu_chuan')->textInput(['maxlength' => true])?>
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'thoi_gian_dang')->widget(DatePicker::classname(), [
                                            'options' => ['placeholder' => 'Thời gian đăng ...'],
                                            'value' => ($model['sanpham']->thoi_gian_dang != null) ? date('d-m-Y', strtotime($model['sanpham']->thoi_gian_dang)) : '',
                                            'pluginOptions' => [
                                                'autoclose' => true,
                                                'format' => 'dd-mm-yyyy'
                                            ]
                                        ])->label('Thời gian Đăng'); ?>
                            
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'thoi_gian_sua')->widget(DatePicker::classname(), [
                                                'options' => ['placeholder' => 'Thời gian đăng ...'],
                                                'value' => ($model['sanpham']->thoi_gian_sua != null) ? date('d-m-Y', strtotime($model['sanpham']->thoi_gian_sua)) : '',
                                                'pluginOptions' => [
                                                    'autoclose' => true,
                                                    'format' => 'dd-mm-yyyy'
                                                ]
                                            ])->label('Thời gian sửa'); ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['sanpham'], 'nganhnghe_id')->dropDownList(ArrayHelper::map($model['nganhnghe'], 'id', 'ten_nganh'), ['prompt' => 'Chọn ngành nghề'])->label('Ngành nghề') ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model['sanpham'], 'thong_so_kt')->widget(TinyMce::className(), [
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
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model['sanpham'], 'tinh_nang_nb')->widget(TinyMce::className(), [
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
                    <div class="row">
                        <div class="col-lg-12">
                            <?= $form->field($model['sanpham'], 'tom_tat')->widget(TinyMce::className(), [
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
                            <?= $form->field($model['sanpham'], 'mo_ta')->widget(TinyMce::className(), [
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
                                    <?= Html::submitButton((isset($model['sanpham']) &&($model['sanpham']->id)==null) ? 'Thêm mới' : 'Cập nhật', ['class' => isset($model['sanpham']) ? 'btn btn-success' : 'btn btn-warning']) ?>
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




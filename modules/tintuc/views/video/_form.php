<?php
use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use wbraganca\videojs\VideoJsWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\widgets\ActiveForm */
$this->title = (((isset($model['video']) && ($model['video']->id)==null)) ? $const['label']['create'] : $const['label']['update']) . ' ' . $const['title'];
$this->params['breadcrumbs'][] = ['label' => $const['label']['index'] . ' ' . $const['title'], 'url' => Yii::$app->urlManager->createUrl($const['url']['index'])];
$this->params['breadcrumbs'][] = $this->title;
 ?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('tintuc/video') ?>">Danh sách video</a>
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
                        <div class="col-lg-4">
                            <?= $form->field($model['video'], 'tieu_de')->textInput(['maxlength' => true]) ?>
                           
                        </div>
                        
                       
                        <div class="col-lg-4">
                            <?= $form->field($model['video'], 'anh_dai_dien')->FileInput() ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['video'], 'ten_video')->FileInput() ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">

                            <?= $form->field($model['video'], 'duong_dan')->textInput() ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['video'], 'thoi_gian_dang')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Thời gian đăng ...'],
                                        'value' => ($model['video']->thoi_gian_dang != null) ? date('d-m-Y', strtotime($model['video']->thoi_gian_dang)) : '',
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Thời gian Đăng'); ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['video'], 'loaitin_id')->dropDownList(ArrayHelper::map($model['loaitin'], 'id', 'ten_loai'), ['prompt' => 'Chọn loại tin'])->label('Loại tin') ?>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <?= $form->field($model['video'], 'tom_tat')->widget(TinyMce::className(), [
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
                            <?= $form->field($model['video'], 'noi_dung')->widget(TinyMce::className(), [
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
                                    <?= Html::submitButton((isset($model['video']) &&($model['video']->id)==null) ? 'Thêm mới' : 'Cập nhật', ['class' => isset($model['video']) ? 'btn btn-success' : 'btn btn-warning']) ?>
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


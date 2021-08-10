<?php
use yii\helpers\Html;
use yii\helpers\Url;
// use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model app\models\TinTuc */
/* @var $form yii\widgets\ActiveForm */
$this->title = (((isset($model['tintuc']) && ($model['tintuc']->id_tintuc)==null)) ? $const['label']['create'] : $const['label']['update']) . ' ' . $const['title'];
$this->params['breadcrumbs'][] = ['label' => $const['label']['index'] . ' ' . $const['title'], 'url' => Yii::$app->urlManager->createUrl($const['url']['index'])];
$this->params['breadcrumbs'][] = $this->title;
?>

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('tintuc/tintuc') ?>">Danh sách tin tức</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Thêm mới tin tức</span>
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
                <div class="portlet-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <?= $form->field($model['tintuc'], 'tieu_de')->textInput(['maxlength' => true]) ?>
                           
                        </div>
                        
                        
                        <div class="col-lg-6">
                            <?= $form->field($model['tintuc'], 'ten_hinh')->FileInput() ?>
                            <?php if(!$model['tintuc']->isNewRecord): ?>
                                <?=Html::img(Yii::$app->homeUrl.'../uploads/file/hinhtintuc/'.$model['tintuc']->ten_hinh,['width'=>'100px'])?>
                               
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">

                            <?= $form->field($model['tintuc'], 'duong_dan')->textInput() ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['tintuc'], 'thoi_gian_dang')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Thời gian đăng ...'],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Thời gian Đăng'); ?>
                        </div>
                        <div class="col-lg-4">
                            <?= $form->field($model['tintuc'], 'loaitin_id')->dropDownList(ArrayHelper::map($model['loaitin'], 'id', 'ten_loai'), ['prompt' => 'Chọn loại tin'])->label('Loại tin') ?>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <?= $form->field($model['tintuc'], 'tom_tat')->widget(TinyMce::className(), [
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
                            <?= $form->field($model['tintuc'], 'noi_dung')->widget(TinyMce::className(), [
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
                                ]);  ?>
                        </div>

                    </div>


                </div>
                <div class="portlet-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if (!Yii::$app->request->isAjax) { ?>
                                <div class="form-group">
                                    <?= Html::submitButton((isset($model['tintuc']) &&($model['tintuc']->id_tintuc)==null) ? 'Thêm mới' : 'Cập nhật', ['class' => isset($model['tintuc']) ? 'btn btn-success' : 'btn btn-warning']) ?>
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

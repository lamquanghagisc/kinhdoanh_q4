<?php
/**
 * Created by PhpStorm.
 * User: Lam Quang Ha
 * Date: 6/7/2021
 * Time: 12:10 PM
 */
// use yii\grid\GridView;
use kartik\form\ActiveForm;
// use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\DCrud\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
$this->title = 'Tin tức';

?>
<!----------------------------------------------------->

<div class="content">
    <div class="row">
        <!----------------------danh sach tin------------------------------->
        <div class="col-md-9">
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <h2 class="text-danger"><span class="fa fa-newspaper"></span> <strong>Tin tức</strong></h2>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Loại tin
                        </button>
                        <div class="dropdown-menu">
                            <?php
                            foreach ($dsloaitin as $item){              
                            ?>
                                <a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl('tin-tuc/loaitin' . '/' . $item->id)?>"><?= $item->ten_loai?></a> 
                            <?php 
                            }
                            ?>   
                        </div>
                    </div>
    
                    <div class="row row-deck">
                        <?php foreach ($model as $i => $item): ?>
                            <div class="col-lg-12">
                    
                                <a class="block block-rounded" href="<?= Yii::$app->urlManager->createUrl('tin-tuc' . '/' . $item->alias_title)?>">
                                    <div class="block-content">
                                        <h4 class="mb-1"><?= $item->tieu_de ?></h4>

                                        <p>
                                            <?= $item->tom_tat ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <div class="col-lg-12">
                            <?= LinkPager::widget([
                                'pagination' => $pagination,
                //                    'linkOptions' => ['href' => 'tin-tuc111111','class' => 'page-link']
                            ]); ?>
                        </div>
                </div>                  
            </div>
        </div>                     
   

        </div>
        <!----------------------------ket thuc danh sach tin------------------------->
        <!----------------------------danh muc------------------------->
        <div class="col-md-3">
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <div class="row gutters-tiny mb-2">
                        <div class="col-12">
                        <?php $form = ActiveForm::begin([
                            'options' => [
                                'action' => Yii::$app->urlManager->createUrl('tin-tuc/timkiem'),
                                'method' =>'get',
                                ]
                            ]) ;
                        ?>

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" id="tieude" name="tieude" placeholder="tiêu đề">
                        </div>
                        <?= Html::submitButton('Search',['btn btn-success'] ) ?>                             
                        <?php ActiveForm::end(); ?>
                        </div>             
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------ket thuc danh muc----------------------->
    </div>
</div>

<!------------------------------------------------------>
<div class="content content-full">

    <h2 class="text-danger"><span class="fa fa-newspaper"></span> <strong>Tin tức</strong></h2>
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Loại tin
        </button>
        <div class="dropdown-menu">
            <?php
            foreach ($dsloaitin as $item){              
            ?>
                <a class="dropdown-item" href="<?= Yii::$app->urlManager->createUrl('tin-tuc/loaitin' . '/' . $item->id)?>"><?= $item->ten_loai?></a> 
            <?php 
            }
            ?>   
        </div>
    </div>
    
    <div class="row row-deck">
        <?php foreach ($model as $i => $item): ?>
            <div class="col-lg-12">
     
                <a class="block block-rounded" href="<?= Yii::$app->urlManager->createUrl('tin-tuc' . '/' . $item->alias_title)?>">
                    <div class="block-content">
                        <h4 class="mb-1"><?= $item->tieu_de ?></h4>

                        <p>
                            <?= $item->tom_tat ?>
                        </p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <div class="col-lg-12">
            <?= LinkPager::widget([
                'pagination' => $pagination,
//                    'linkOptions' => ['href' => 'tin-tuc111111','class' => 'page-link']
            ]); ?>
        </div>
    </div>
</div>

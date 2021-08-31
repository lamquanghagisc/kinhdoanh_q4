<?php

use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use app\modules\DCrud\DCrudAsset;
use app\modules\DCrud\grid\GridView;
use app\modules\DCrud\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $model app\models\TinTuc */
DCrudAsset::register($this);
$this->title = ((isset($model)) ? $const['label']['view'] : '') . ' ' . $const['title'];
$this->params['breadcrumbs'][] = ['label' => $const['label']['index'] . ' ' . $const['title'] , 'url' => Yii::$app->urlManager->createUrl($const['url']['view'])];
$this->params['breadcrumbs'][] = $this->title;
// dd($const['buttons']['update'] );
?>

<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span><?= $this->title ?></span>
                </div>
                <div class="caption pull-right">
                    <?= $const['buttons']['create'] ?>
                    <?= $const['buttons']['update'] ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <tr class="active">
                                <th ><?= $model->getAttributeLabel('tieu_de') ?></th>
                                <td ><?= $model->tieu_de ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('tom_tat') ?></th>
                                <td><?= $model->tom_tat ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('noi_dung') ?></th>
                                <td><?= $model->noi_dung ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('slug') ?></th>
                                <td><?= $model->slug ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('thoi_gian_dang') ?></th>
                                <td><?= $model->thoi_gian_dang ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('ten_hinh') ?></th>
                                <td><?= $model->ten_hinh ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('loaitin_id') ?></th>
                                <td><?= $model->dmloaitin->ten_loai ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('taikhoan_id') ?></th>
                                <td><?= $model->taikhoan->ten_dang_nhap ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>

            <div class="portlet-footer">
                <div class="row">
                    <div class="col-lg-12">

                            <div class="form-group">

                                <?= $const['buttons']['back'] ?>
                            </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<div class="modal fade" id="ajaxModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="ajaxModalContent">

        </div>
    </div>
</div>

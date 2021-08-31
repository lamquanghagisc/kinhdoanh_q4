<?php

use yii\widgets\DetailView;
use app\modules\DCrud\DCrudAsset;
/* @var $this yii\web\View */
/* @var $model app\models\SanPham */
DCrudAsset::register($this);
$this->title = ((isset($model)) ? $const['label']['view'] : '') . ' ' . $const['title'];
$this->params['breadcrumbs'][] = ['label' => $const['label']['index'] . ' ' . $const['title'] , 'url' => Yii::$app->urlManager->createUrl($const['url']['view'])];
$this->params['breadcrumbs'][] = $this->title;
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
                                <th ><?= $model->getAttributeLabel('ten_san_pham') ?></th>
                                <td ><?= $model->ten_san_pham ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('tom_tat') ?></th>
                                <td><?= $model->tom_tat ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('mo_ta') ?></th>
                                <td><?= $model->mo_ta ?></td>
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
                                <th><?= $model->getAttributeLabel('thoi_gian_sua') ?></th>
                                <td><?= $model->thoi_gian_sua ?></td>
                            </tr>
                            
                            <tr>
                                <th><?= $model->getAttributeLabel('anh_dai_dien') ?></th>
                                <td><?= $model->anh_dai_dien ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('nganhnghe_id') ?></th>
                                <td><?= $model->dmnganhnghe->ten_nganh ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('taikhoan_id') ?></th>
                                <td><?= $model->taikhoan->ten_dang_nhap ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('gia_san_pham') ?></th>
                                <td><?= $model->gia_san_pham ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('so_luong') ?></th>
                                <td><?= $model->so_luong ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('nam_sx') ?></th>
                                <td><?= $model->nam_sx ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('hang_sx') ?></th>
                                <td><?= $model->hang_sx ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('model') ?></th>
                                <td><?= $model->model ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('xuat_xu') ?></th>
                                <td><?= $model->xuat_xu ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('bao_hanh') ?></th>
                                <td><?= $model->bao_hanh ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('thong_so_kt') ?></th>
                                <td><?= $model->thong_so_kt ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('tinh_nang_nb') ?></th>
                                <td><?= $model->tinh_nang_nb ?></td>
                            </tr>
                            <tr>
                                <th><?= $model->getAttributeLabel('dat_tieu_chuan') ?></th>
                                <td><?= $model->dat_tieu_chuan ?></td>
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
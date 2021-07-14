<?php

use yii\widgets\DetailView;

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 10/6/2017
 * Time: 4:50 PM
 */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Thông tin hộ kinh doanh</h4>
</div>
<div class="modal-body">
    <div class="tabbable-line">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>
             <li><a data-toggle="tab" href="#thongtinvipham">Thông tin vi phạm</a></li>
           
        </ul>
        <div class="tab-content">
            <div class=" tab-pane active" id="thongtinchung">
                <div class="col-md-12 form-group" >
                    <table class="table table-responsive table-bordered table-striped">
                        <tr>
                            <th>Tên hộ kinh doanh</th>
                            <td colspan="3"><?= $model['hokinhdoanh']->ten_hkd?></td>
                        </tr>
                        <tr>
                            <th>Địa điểm kinh doanh</th>
                            <td colspan="3"><?= (($model['hokinhdoanh']->vi_tri == NULL) ? '' : $model['hokinhdoanh']->vi_tri . ', ') . (($model['hokinhdoanh']->so_nha == NULL) ? '' : $model['hokinhdoanh']->so_nha . ', ') . (($model['hokinhdoanh']->ten_duong == NULL) ? '' : $model['hokinhdoanh']->ten_duong . ', ') . (($model['hokinhdoanh']->ten_phuong == NULL) ? '' : $model['hokinhdoanh']->ten_phuong)?></td>
                        </tr>
                        <tr>
                            <th>Giấy phép số</th>
                            <td><?= $model['hokinhdoanh']->so_giayphep?></td>
                            <th>Cấp ngày</th>
                            <td><?= ($model['hokinhdoanh']->ngaycap_giayphep != null) ? date('d-m-Y', strtotime($model['hokinhdoanh']->ngaycap_giayphep)) : ''?></td>
                        </tr>
                        <tr>
                            <th>Điện thoại</th>
                            <td><?= ($model['hokinhdoanh']->dien_thoai == null) ? '(Chưa có)' : $model['hokinhdoanh']->dien_thoai?></td>
                            <th>Fax</th>
                            <td><?= ($model['hokinhdoanh']->fax == null) ? '(Chưa có)' : $model['hokinhdoanh']->fax?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= ($model['hokinhdoanh']->email == null) ? '(Chưa có)' : $model['hokinhdoanh']->email?></td>
                            <th>Website</th>
                            <td><?= ($model['hokinhdoanh']->website == null) ? '(Chưa có)' : $model['hokinhdoanh']->website?></td>
                        </tr>
                        <tr>
                            <th>Ngành nghề</th>
                            <td colspan="3"><?= $model['hokinhdoanh']->nganh_kd?></td>
                        </tr>
                        <tr>
                            <th>Vốn kinh doanh</th>
                            <td colspan="3"><?= ($model['hokinhdoanh']->von_kd == null) ? '(Chưa có)' : $model['hokinhdoanh']->von_kd?></td>
                        </tr>
                        <tr>
                            <th>Đại diện</th>
                            <td colspan="3"><?= ($model['hokinhdoanh']->nguoi_daidien == null) ? '(Chưa có)' : $model['hokinhdoanh']->nguoi_daidien?></td>
                        </tr>
                        <tr>
                            <th>Tình trạng hoạt động</th>
                            <td><?= ($model['hokinhdoanh']->tinhtrang_hd == null) ? '(Chưa có)' : $model['hokinhdoanh']->tinhtrang_hd?></td>
                        </tr>
                       
                     
                     
                    </table>
                </div>
            </div>
             <div class="tab-pane" id="thongtinvipham">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>STT</th>
                        <th>Số biên bản</th>
                        <th>Ngày lập</th>
                        <th>Đơn vị lập</th>
                        <th>Nội dung vi phạm</th>
                        <th>Số quyết định</th>
                        <th>Ngày quyết định</th>
                        <th>Đơn vị ra QĐ</th>
                        <th>Hình phạt</th>

                        <th></th>
                    </tr>
                    <?php if (isset($model['vipham']) && $model['vipham'] != null): ?>
                        <?php foreach ($model['vipham'] as $i => $vipham): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= ($vipham['bienban_so'] != null) ? $vipham['bienban_so'] : '' ?></td>
                                <td><?= ($vipham['ngay_lap'] != null) ? date('d-m-Y', strtotime($vipham['ngay_lap'])) : '' ?></td>
                                <td><?= ($vipham['donvi_lap'] != null) ? $vipham['donvi_lap'] : '' ?></td>
                                <td><?= ($vipham['noidung_vipham'] != null) ? $vipham['noidung_vipham'] : '' ?></td>
                                <td><?= ($vipham['quyetdinh_so'] != null) ? $vipham['quyetdinh_so'] : '' ?></td>
                                <td><?= ($vipham['quyetdinh_ngay'] != null) ? date('d-m-Y', strtotime($vipham['quyetdinh_ngay'])) : '' ?></td>
                                <td><?= ($vipham['donvi_qd'] != null) ? $vipham['donvi_qd'] : '' ?></td>
                                <td><?= ($vipham['hinhthuc_phat'] != null) ? $vipham['hinhthuc_phat'] : '' ?></td>

                            <?php endforeach; ?>
                        <?php endif ?>
                </table>
            </div>
          
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Đóng</button>
    <a class="btn btn-warning pull-left" href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/update') . '?id=' . $model['hokinhdoanh']->id_hkd ?>">Cập nhật</a>
</div>
<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 9/7/2017
 * Time: 3:17 PM
 */
use kartik\grid\GridView;
?>

<div class="col-lg-12" id="tab_vipham">

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
                    <td>
                        <a class=" custom-element-load-ajax-div"
                           data-target-div="#ajaxModalContentVp" data-toggle="modal" data-target="#ajaxModalVipham"
                           data-url="<?= Yii::$app->homeUrl ?>hokinhdoanh/updatevipham?id=<?= $vipham['id_ttvp'] ?>"><i
                                class="fa fa-pencil"></i></a>
                        <a class=" custom-element-load-ajax-div"
                           data-target-div="#ajaxModalContentVp" data-toggle="modal" data-target="#ajaxModalVipham"
                           data-url="<?= Yii::$app->homeUrl ?>hokinhdoanh/deletevipham?id=<?= $vipham['id_ttvp'] ?>"><i
                                class="fa fa-remove"></i></a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php endif ?>
    </table>
    <div class="col-lg-12 form-group">
        <a class="btn btn-success pull-right custom-element-load-ajax-div"
           data-target-div="#ajaxModalContentVp" data-toggle="modal" data-target="#ajaxModalVipham"
           data-url="<?= Yii::$app->homeUrl ?>hokinhdoanh/createvipham?id=<?= $model['id_hkd'] ?>">Thêm mới thông tin vi phạm</a>
    </div>
</div>
<div style="clear: both"></div>

<div class="modal fade" id="ajaxModalVipham" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content" id="ajaxModalContentVp">

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        uiEventUpdate('#tab_vipham ');
    });

</script>

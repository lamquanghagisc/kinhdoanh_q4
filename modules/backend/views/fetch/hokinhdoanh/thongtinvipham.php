<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/9/2021
 * Time: 10:34 AM
 */

?>

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
    <?php if ($model != null): ?>
    <?php foreach ($model as $i => $vipham): ?>
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

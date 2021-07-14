<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/3/2021
 * Time: 4:10 PM
 */

?>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Sản phẩm</th>
        <th>Ngày nhập kho</th>
        <th>Giá mua</th>
    </tr>
    <?php foreach($model as $i => $sp):?>
    <tr>
        <td><?= $i + 1?></td>
        <td><?= $sp->sanpham->ten?></td>
        <td><?= date('d-m-Y', strtotime($sp->ngay_nhap_kho))?></td>
        <td><?= number_format($sp->gia_mua_vnd, 0 , '.', ',')?></td>
    </tr>
    <?php endforeach;?>
</table>

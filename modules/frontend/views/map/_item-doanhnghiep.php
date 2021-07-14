<div style="font-family: Tahoma" class="dn-item" data-point-x="<?= $model["geo_x"] ?>" data-point-y="<?= $model["geo_y"] ?>">
    <div class="ten"><?= $model['ten_dn'] ?> </div>
    <div class="nganhnghe" title="<?= $model['ten_linhvuc'] ?>">Lĩnh vực: <?= $model['ten_linhvuc'] ?></div>
       <div class="diachi">Địa chỉ: <?= (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?></div>

</div>
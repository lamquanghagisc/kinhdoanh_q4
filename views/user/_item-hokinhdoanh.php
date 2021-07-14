<div style="font-family: Tahoma" class="hokd-item" data-point-x="<?= $model["geo_x"] ?>" data-point-y="<?= $model["geo_y"] ?>">
    <div class="ten"><?= (($model['ten_hkd'] == NULL) ? '(Chưa có)' : $model['ten_hkd']) ?></div>
    <div class="linhvuc"><?= (($model['ten_linhvuc'] == NULL) ? '(Chưa có)' : $model['ten_linhvuc']) ?></div>
       <div class="diachi">Địa chỉ: <?= (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?></div>

     </div>
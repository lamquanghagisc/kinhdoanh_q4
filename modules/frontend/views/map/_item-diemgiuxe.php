<div style="font-family: Tahoma" class="diemgiuxe-item" >
    <div class="ten"><?= (($model['ten_diemgiuxe'] == NULL) ? '(Chưa có)' : $model['ten_diemgiuxe']) ?></div>
    <div class="chudautu"><?= 'Chủ đầu tư: '.(($model['chu_dau_tu'] == NULL) ? '(Chưa có)' : $model['chu_dau_tu']) ?></div>
       <div class="diachi">Địa chỉ: <?= (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?></div>

     </div>
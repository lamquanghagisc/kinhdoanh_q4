<div class="col-lg-12">
    <div style="font-size: 11px; margin-bottom: 10px" class="font-red-haze pull-right"><b>Có <?= $totalcount ?> kết quả</b></div>
</div>
<div class="mt-element-list hkd-list ">
    <div class="mt-list-container hokd-list" style='max-height: 650px; overflow: auto'>

        <?php foreach ($models as $model): ?>

            <div class="hokd-item" style="font-family: Tahoma" data-point-x="<?= $model["geo_x"] ?>"
                 data-point-y="<?= $model["geo_y"] ?>">
                <div class="col-lg-12">
                    <div class="ten"><?= (($model['ten_hkd'] == NULL) ? '(Chưa có)' : $model['ten_hkd']) ?>
                        <?php if ($model["geo_x"] != null): ?>
                            <span style='color: "blue"'><i class="fa fa-map-marker"></i></span>
                        <?php else: ?>
                            <span style=''><i style='color: gray' class="fa fa-map-marker"></i></span>
                        <?php endif; ?>
                    </div>
                    <div class="daidien">Lĩnh vực: <?= $model['ten_linhvuc'] ?></div>
                    <div class="diachi">Địa chỉ:  <?= (($model['vi_tri'] == NULL) ? '' : $model['vi_tri'] . ', ') . (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?>
                    </div>
                </div>
            </div>

   
        <?php endforeach; ?>
      <?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
    </div>
  
</div>


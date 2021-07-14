<div class="col-lg-12">
    <div style="font-size: 11px; margin-bottom: 10px" class="font-red-haze pull-right"><b>Có <?= $totalcount ?> kết quả</b></div>
</div>
<div class="mt-element-list dn-list ">
    <div class="mt-list-container dn-list" style='max-height: 650px; overflow: auto'>

        <?php foreach ($models as $model): ?>

            <div class="dn-item" style="font-family: Tahoma" data-point-x="<?= $model["geo_x"] ?>"
                 data-point-y="<?= $model["geo_y"] ?>">
                <div class="col-lg-12">
                    <div class="ten">                                        <?= (($model['ten_dn'] == NULL) ? '(Chưa có)' : $model['ten_dn']) ?>
                                        <?php if ($model["geo_x"] != null): ?>
                            <span style='color: "blue"'><i class="fa fa-map-marker"></i></span>
                        <?php else: ?>
                            <span style=''><i style='color: gray' class="fa fa-map-marker"></i></span>
                        <?php endif; ?>
                    </div>
                     <div class="loaihinh">Loại hình: <?= $model['ten_loai'] ?></div>
                  
                  
                   
                    <div class="nganhnghe" title="<?= $model['ten_linhvuc'] ?>">Ngành KD: <?= $model['ten_linhvuc'] ?>  </div>
                    
                  
                        <div class="ghichu">Địa chỉ: <?= (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?>
                    </div>

                 
                </div>


            </div>
        <?php endforeach; ?>
        <?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
    </div>
    
</div>

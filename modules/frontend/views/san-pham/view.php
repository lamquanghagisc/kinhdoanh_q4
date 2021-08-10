<?php
use kartik\social\FacebookPlugin;
/**
 * Created by PhpStorm.
 * User: Lam Quang Ha
 * Date: 09/08/2021
 * Time: 23:11 PM
 */

$this->title = $model->ten_san_pham;
$this->params['breadcrumbs'][] = ['label' => 'Sản phẩm', 'url' => Yii::$app->urlManager->createUrl('san-pham/1')];
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    h6 {
          text-align: center;
        }
       
</style>
<div class="content content-full padding-t-0">
    <div class="block">
        <div class="block-content">
            <h2><?= $model->ten_san_pham?></h2>
            <p class="font-size-sm">
                <span class="text-black"><?= date('H:i:s d-m-Y', strtotime($model->thoi_gian_dang))?></span>
            </p>
            <div>
                <img class="card-img-top" src="<?= Yii::$app->homeUrl?>../uploads/file/hinhsanpham/<?=$model->anh_dai_dien?>" alt="Card image cap">
            </div>
            <p >
                <h6 class="card-subtitle mb-2 text-warning">Giá: <?= number_format($model->gia_san_pham,0,',','.') ?> VNĐ</h6>
            </p>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="mota-tab" data-toggle="tab" href="#mota" role="tab" aria-controls="mota" aria-selected="true">Mô tả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="thongtinchitiet-tab" data-toggle="tab" href="#thongtinchitiet" role="tab" aria-controls="thongtinchitiet" aria-selected="false">Thông tin chi tiết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="thongsokythuat-tab" data-toggle="tab" href="#thongsokythuat" role="tab" aria-controls="thongsokythuat" aria-selected="false">Thông số kỹ thuật</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tinhnang-tab" data-toggle="tab" href="#tinhnang" role="tab" aria-controls="tinhnang" aria-selected="false">Tính năng nổi bật</a>
                    </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="mota" role="tabpanel" aria-labelledby="mota-tab">
                            <p>
                                <?= htmlspecialchars_decode($model->mo_ta)?>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="thongtinchitiet" role="tabpanel" aria-labelledby="thongtinchitiet-tab">
                            <table class="table table-bordered">
                                <tr>
                                    <th class="table-primary">Hãng sản xuất</th>
                                    <td class="table-danger"><?=$model->hang_sx?></td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Model</th>
                                    <td class="table-danger"><?=$model->model?></td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Xuất xứ</th>
                                    <td class="table-danger"><?=$model->xuat_xu?></td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Bảo hành</th>
                                    <td class="table-danger"><?=$model->bao_hanh?></td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Năm sản xuất</th>
                                    <td class="table-danger"><?=$model->nam_sx?></td>
                                </tr>
                                <tr>
                                    <th class="table-primary">Đạt tiêu chuẩn</th>
                                    <td class="table-danger"><?=$model->dat_tieu_chuan?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="thongsokythuat" role="tabpanel" aria-labelledby="thongsokythuat-tab">
                            <p>
                                <?= $model->thong_so_kt ?></p>
                        </div>
                        <div class="tab-pane fade" id="tinhnang" role="tabpanel" aria-labelledby="tinhnang-tab">
                            <p>
                                <?= $model->thong_so_kt ?>
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div>
                <?= FacebookPlugin::widget(['type'=>FacebookPlugin::SHARE, 'settings' => ['size'=>'large', 'layout'=>'button_count', 'mobile_iframe'=>'false']])?>
            </div>
        </div>
    </div>
</div>

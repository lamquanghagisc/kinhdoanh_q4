<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 6/2/2021
 * Time: 3:44 PM
 */

use yii\bootstrap\Modal;
use app\modules\DCrud\grid\GridView;
use app\modules\DCrud\DCrudAsset;
use yii\helpers\Html;

DCrudAsset::register($this);

$this->title = (isset($const['title'])) ? $const['title'] : 'Chi tiết đơn hàng';
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row">
        <div class="col-lg-6">
            <div class="block block-themed">
                <div class="block-header">
                    <h3 class="block-title">Thông tin khách hàng</h3>
                </div>
                <div class="block-content">
                    <table class="table table-striped">
                        <tr>
                            <th width="25%">Tên</th>
                            <td><?= $model->khachhang->ten ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Điện thoại</th>
                            <td><?= $model->khachhang->dien_thoai ?></td>
                        </tr>
                        <tr>
                            <th width="25%">Địa chỉ</th>
                            <td><?= $model->khachhang->dia_chi ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <?= GridView::widget([
                'id' => 'crud-datatable',
                'dataProvider' => $dataProvider,
                'pjax' => true,
                'columns' => [
                    [
                        'class' => 'kartik\grid\SerialColumn',
                        'width' => '30px',
                    ],
                    [
                        'attribute' => 'kho_id',
                    ],
                    [
                        'attribute' => 'so_luong',
                    ],
                    [
                        'attribute' => 'gia_ban',
                    ],
                    [
                        'class' => 'kartik\grid\ActionColumn',
                    ],
                ],
                'toolbar' => [
                    ['content' =>
                        Html::a('<i class="fa fa-plus"></i> Thêm mới', ['add','id' => $model->id],
                            ['role' => 'modal-remote', 'title' => 'Thêm mới Đơn hàng', 'class' => 'btn btn-success'])
                    ],
                ],
                'striped' => true,
                'condensed' => true,
                'responsive' => false,
                'panelPrefix' => 'block ',
                'summaryOptions' => ['class' => 'float-right'],
                'panel' => [
                    'type' => 'block-themed',
                    'headingOptions' => ['class' => 'block-header'],
                    'summaryOptions' => ['class' => ''],
                    'titleOptions' => ['class' => 'block-title'],
                    'heading' => $this->title,
                ]
            ]) ?>
        </div>
    </div>

<?php Modal::begin([
    "id" => "ajaxCrudModal",
    'size' => Modal::SIZE_LARGE,
    "footer" => "",// always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>
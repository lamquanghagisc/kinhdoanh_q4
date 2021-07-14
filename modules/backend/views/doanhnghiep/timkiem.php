<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 7/31/2017
 * Time: 3:07 PM
 */

use app\modules\DCrud\DCrudAsset;
use app\modules\DCrud\grid\GridView;

DCrudAsset::register($this);
$this->title = (isset($const['title'])) ? $const['title'] : 'Tìm kiếm Doanh nghiệp';
$this->params['breadcrumbs'][] = ['label' => 'Doanh nghiệp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block block-themed">
    <div class="block-header">
        <h3 class="block-title text-uppercase">
            <?= $this->title ?>
        </h3>
    </div>
    <div class="block-content padding-tb-05">
        <?= $this->render('_search', ['model' => $model]) ?>
        <div id="ajaxCrudDatatable">
            <?=
            GridView::widget([
                'id' => 'crud-datatable',
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'pjax' => true,
                'columns' => require(__DIR__ . '/_result.php'),
                'toolbar' => [
                    '{toggleData}' .
                    '{export}'
                ],
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'panel' => [
                    'type' => 'primary',
                    'heading' => '<i class="glyphicon glyphicon-list"></i> Kết quả tìm kiếm',
                    'after' => false,
                ]
            ])
            ?>
        </div>
    </div>
</div>

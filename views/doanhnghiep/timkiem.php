<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 7/31/2017
 * Time: 3:07 PM
 */

use johnitvn\ajaxcrud\CrudAsset;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

CrudAsset::register($this);
?>
<?= $this->render('_search', ['model' => $model]) ?>

    <div class="doanh-nghiep-index" style="overflow-x: auto">
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


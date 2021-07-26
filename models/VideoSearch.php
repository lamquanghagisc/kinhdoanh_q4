<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Video;
use yii\helpers\Html;

/**
 * VideoSearch represents the model behind the search form about `app\models\Video`.
 */
class VideoSearch extends Video
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['duong_dan','loaitin_id', 'taikhoan_id','tieu_de', 'tom_tat', 'alias_title', 'ten_video', 'thoi_gian_dang'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Video::find();
        $query ->joinWith(['dmloaitin','taikhoan']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            // 'loaitin_id' => $this->loaitin_id,
            // 'taikhoan_id' => $this->taikhoan_id,
            'thoi_gian_dang' => $this->thoi_gian_dang,
        ]);

        $query->andFilterWhere(['like', 'upper(tieu_de)', mb_strtoupper($this->tieu_de)])
            ->andFilterWhere(['like', 'upper(tom_tat)', mb_strtoupper($this->tom_tat)])
            ->andFilterWhere(['like', 'upper(alias_title)', mb_strtoupper($this->alias_title)])
            ->andFilterWhere(['like', 'upper(ten_video)', mb_strtoupper($this->ten_video)])
            ->andFilterWhere(['like', 'upper(duong_dan)', mb_strtoupper($this->duong_dan)])
            ->andFilterWhere(['like', 'upper(dm_loaitin.ten_loai)', mb_strtoupper($this->loaitin_id)])//dm_loaitin tên table
            ->andFilterWhere(['like', 'upper(taikhoan.ten_dang_nhap)', mb_strtoupper($this->taikhoan_id)]);
        return $dataProvider;
    }

    public function getExportColumns($categories,$const)
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'tieu_de',
            ],
            
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'tom_tat',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'alias_title',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'thoi_gian_dang',
                
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'ten_video',
                
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'loaitin_id',
                'value' => 'dmloaitin.ten_loai',
                'label' => 'Loại tin'
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'taikhoan_id',
                'value' => 'taikhoan.ten_dang_nhap',
                'label' => 'Tên đăng nhập'
            ],     
        
        
        ];
    }
    public function getGridColumns($categories,$const,$searchModel){
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
                'width' => '30px',
            ],
               
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'tieu_de',
                'value' =>function ($model, $key, $index, $widget) { 
                    
                    // return $model->noi_dung;
                    return strip_tags($model->tieu_de) ;
                },
                'format'=>'html',   

                'contentOptions' => [

                    'style'=>' overflow: auto; word-wrap: break-word;white-space:pre-line;'

                ],
            ],
           
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'tom_tat',
                'value' =>function ($model, $key, $index, $widget) { 
                    
                    
                    return strip_tags($model->tom_tat) ;
                },
                'format'=>'html',   
                'contentOptions' => [
                    'style'=>' overflow: auto; word-wrap: break-word;white-space:pre-line;'
                ],
               
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'alias_title',
            ],
            
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'ten_video',
                   
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'duong_dan',
            ],
            [
                //  'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'thoi_gian_dang',
               
                'value' => function ($model, $key, $index, $widget) { 
                    return date("d-m-Y", strtotime($model->thoi_gian_dang));
                },       
                
            ],
            [
                'class'=>'\kartik\grid\DataColumn',               
                'attribute'=>'loaitin_id',
                'value' => 'dmloaitin.ten_loai',
                'label' => 'Loại tin',
               
                // 'filter' => Html::activeDropDownList($searchModel,'loaitin_id',ArrayHelper::map(DmLoaitin::find()->asArray()->all(),'id','ten_loai'),['class' =>'form-control','prompt'=>'Chọn']),
            ],
            [
                'class'=>'\kartik\grid\DataColumn',              
                'attribute'=>'taikhoan_id',
                'value' => 'taikhoan.ten_dang_nhap',
                'label' => 'Tên đăng nhập'
            ],    
            [
                'class' => 'kartik\grid\ActionColumn',
                'header' => 'Thao tác',
                'width' => '120px',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function ($action, $model, $key, $index) use ($const) {
                    // dd($key);
                    return Yii::$app->urlManager->createUrl([$const['url'][$action], 'id' => $key]);
                },
                'template' => '{view}{update}{delete}',
                'buttons' => [
                    'export' => function ($url) {
                        return Html::a("<i class='fa fa-arrow-down'></i> ", Yii::$app->urlManager->createUrl('..'.$url),['class' =>" btn btn-xs green-jungle btn-outline sbold",'title' => 'Export']);
                    }
                ],

                'viewOptions' => [
                    'title' => 'Chi tiết',
                    'data-toggle' => 'tooltip',
                    'data-pjax' => 0,
                    'class' => 'btn btn-xs btn-info'
                ],
                'updateOptions' => [
                    'title' => 'Cập nhật',
                    'data-toggle' => 'tooltip',
                    'data-pjax' => 0,
                    'class' => 'btn btn-xs btn-warning'
                ],
                'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete', 'class' => 'btn btn-danger btn-xs',
                    'data-confirm' => false, 'data-method' => false,// for overide yii data api
                    'data-request-method' => 'post',
                    'data-toggle' => 'tooltip',
                    'data-confirm-title' => 'Xóa ' . $const['title'],
                    'data-confirm-message' => 'Bạn chắc chắn muốn xóa ' . $const['title'] . ' này?'],

            ],  
        ];
    }
}

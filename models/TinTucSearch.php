<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TinTuc;
// use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use dosamigos\datetimepicker\DateTimePicker;
use yii\widgets\DetailView;

// use yii\jui\DatePicker;
// use kartik\date\DatePicker;

// use kartik\date\DatePicker ;

// use kartik\date\DatePicker;
// use kartik\date\DatePickerAsset;

/**
 * TinTucSearch represents the model behind the search form about `app\models\TinTuc`.
 */
class TinTucSearch extends TinTuc
{
    // public $ten_loai;
    // public $ten_dang_nhap;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tintuc'], 'integer'],
            [['thoi_gian_dang'], 'date','format' => 'dd-MM-yyyy'],
            [['loaitin_id', 'taikhoan_id','tieu_de', 'duong_dan', 'noi_dung', 'thoi_gian_dang', 'tom_tat', 'alias_title'], 'safe'],
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
        $query = TinTuc::find();
        $query ->joinWith(['dmloaitin','taikhoan']);//dmloaitin ten hàm quan he trong model

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
            'id_tintuc' => $this->id_tintuc,
            'thoi_gian_dang' => $this->thoi_gian_dang,
            // 'loaitin_id' => $this->loaitin_id,
            // 'thoi_gian_dang' => date('Y-m-d', strtotime(str_replace('/','-',$this->thoi_gian_dang)))
            
          
        ]);
        // var_dump($query->createCommand()->sql);
        $query->andFilterWhere(['like', 'upper(tieu_de)', mb_strtoupper($this->tieu_de)])
            ->andFilterWhere(['like', 'upper(duong_dan)', mb_strtoupper($this->duong_dan)])
            ->andFilterWhere(['like', 'upper(noi_dung)', mb_strtoupper($this->noi_dung)])
            ->andFilterWhere(['like', 'upper(tom_tat)', mb_strtoupper($this->tom_tat)])
            // ->andFilterWhere(['=', 'loaitin_id', $this->loaitin_id])
           
            ->andFilterWhere(['like', 'upper(alias_title)', mb_strtoupper($this->alias_title)]) 
            //  ->andFilterWhere(['like', 'upper(dm_loaitin.ten_loai)', mb_strtoupper($this->ten_loai)])//dm_loaitin tên table
            // ->andFilterWhere(['like', 'upper(taikhoan.ten_dang_nhap)', mb_strtoupper($this->ten_dang_nhap)])
            ->andFilterWhere(['like', 'upper(dm_loaitin.ten_loai)', mb_strtoupper($this->loaitin_id)])//dm_loaitin tên table
            ->andFilterWhere(['like', 'upper(taikhoan.ten_dang_nhap)', mb_strtoupper($this->taikhoan_id)]);
            // var_dump($query->createCommand()->sql);

        return $dataProvider;
    }
    public function searchloaitin($params)
    {
        $query = TinTuc::find();
        $query ->joinWith(['dmloaitin','taikhoan']);//dmloaitin ten hàm quan he trong model

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
            'id_tintuc' => $this->id_tintuc,
            'thoi_gian_dang' => $this->thoi_gian_dang,
            // 'loaitin_id' => $this->loaitin_id,
            // 'thoi_gian_dang' => date('Y-m-d', strtotime(str_replace('/','-',$this->thoi_gian_dang)))
            
          
        ]);
        // var_dump($query->createCommand()->sql);
        $query->andFilterWhere(['like', 'upper(tieu_de)', mb_strtoupper($this->tieu_de)])
            ->andFilterWhere(['like', 'upper(duong_dan)', mb_strtoupper($this->duong_dan)])
            ->andFilterWhere(['like', 'upper(noi_dung)', mb_strtoupper($this->noi_dung)])
            ->andFilterWhere(['like', 'upper(tom_tat)', mb_strtoupper($this->tom_tat)])
            // ->andFilterWhere(['=', 'loaitin_id', $this->loaitin_id])
           
            ->andFilterWhere(['like', 'upper(alias_title)', mb_strtoupper($this->alias_title)]) 
            //  ->andFilterWhere(['like', 'upper(dm_loaitin.ten_loai)', mb_strtoupper($this->ten_loai)])//dm_loaitin tên table
            // ->andFilterWhere(['like', 'upper(taikhoan.ten_dang_nhap)', mb_strtoupper($this->ten_dang_nhap)])
            ->andFilterWhere(['like', 'upper(dm_loaitin.ten_loai)', mb_strtoupper($this->loaitin_id)])//dm_loaitin tên table
            ->andFilterWhere(['like', 'upper(taikhoan.ten_dang_nhap)', mb_strtoupper($this->taikhoan_id)]);
            // var_dump($query->createCommand()->sql);

        return $dataProvider;
    }


    public function getExportColumns()
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
                'width' => '30px',
            ],
               
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'tieu_de',
            ],
           
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'noi_dung',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'thoi_gian_dang',
                
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
                'attribute'=>'ten_loai',
                'value' => 'dmloaitin.ten_loai',
                'label' => 'Loại tin'
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'ten_dang_nhap',
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
            ],
           
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'noi_dung',
                'value' =>function ($model, $key, $index, $widget) { 
                    
                    return $model->noi_dung;
                },
                
            ],
            [
                //  'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'thoi_gian_dang',
                
                // 'content'=>function($data){
                //     if($data->thoi_gian_dang != '')
                //         return date("d-m-Y",strtotime($data->thoi_gian_dang));
                // }
                'value' => function ($model, $key, $index, $widget) { 
                    return date("d-m-Y h:m:s", strtotime($model->thoi_gian_dang));
                },
               
				
            
               
                
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
                // 'attribute'=>'ten_loai',
                'attribute'=>'loaitin_id',
                'value' => 'dmloaitin.ten_loai',
                'label' => 'Loại tin',
                // 'filter' =>Tintuc::get_Loaitin(),
                // 'filter' => Html::activeDropDownList($searchModel,'loaitin_id',ArrayHelper::map(DmLoaitin::find()->asArray()->all(),'id','ten_loai'),['class' =>'form-control','prompt'=>'Chọn']),
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
               //  'attribute'=>'ten_dang_nhap',
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
                    return Yii::$app->urlManager->createUrl([$const['url'][$action], 'id' => $key]);
                },
                'template' => '{view}{update}{delete}{export}',
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

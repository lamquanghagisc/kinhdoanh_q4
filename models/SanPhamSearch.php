<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SanPham;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/**
 * SanPhamSearch represents the model behind the search form about `app\models\SanPham`.
 */
class SanPhamSearch extends SanPham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id',], 'integer'],
            [[ 'noi_bat', 'nganhnghe_id', 'taikhoan_id','ten_san_pham', 'slug', 'tom_tat', 'mo_ta', 'thoi_gian_dang', 'thoi_gian_sua','gia_san_pham','so_luong','nam_sx','bao_hanh','hang_sx','model','xuat_xu','thong_so_kt','tinh_nang_nb','dat_tieu_chuan'], 'safe'],
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
        $query = SanPham::find();
        $query ->joinWith(['dmnganhnghe','taikhoan']);
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
            'thoi_gian_dang' => $this->thoi_gian_dang,
            'noi_bat' => $this->noi_bat,
            'thoi_gian_sua' => $this->thoi_gian_sua,
            'nganhnghe_id' => $this->nganhnghe_id,
            'gia_san_pham' =>$this->gia_san_pham,
            'so_luong' =>$this->so_luong,
            'nam_sx'=> $this->nam_sx,
            'bao_hanh' =>$this->bao_hanh,
           
            // 'taikhoan_id' => $this->taikhoan_id,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_san_pham)', mb_strtoupper($this->ten_san_pham)])
            ->andFilterWhere(['like', 'upper(slug)', mb_strtoupper($this->slug)])
            ->andFilterWhere(['like', 'upper(tom_tat)', mb_strtoupper($this->tom_tat)])
            ->andFilterWhere(['like', 'upper(mo_ta)', mb_strtoupper($this->mo_ta)])
            ->andFilterWhere(['like', 'upper(hang_sx)', mb_strtoupper($this->hang_sx)])
            ->andFilterWhere(['like', 'upper(model)', mb_strtoupper($this->model)])
            ->andFilterWhere(['like', 'upper(xuat_xu)', mb_strtoupper($this->xuat_xu)])
            ->andFilterWhere(['like', 'upper(thong_so_kt)', mb_strtoupper($this->thong_so_kt)])
            ->andFilterWhere(['like', 'upper(tinh_nang_nb)', mb_strtoupper($this->tinh_nang_nb)])
            ->andFilterWhere(['like', 'upper(dat_tieu_chuan)', mb_strtoupper($this->dat_tieu_chuan)])
            ->andFilterWhere(['like', 'upper(anh_dai_dien)', mb_strtoupper($this->anh_dai_dien)])
            // ->andFilterWhere(['like', 'upper(dm_nganhnghe.ten_nganh)', mb_strtoupper($this->nganhnghe_id)])//dm_nganhnghe tên table
            ->andFilterWhere(['like', 'upper(taikhoan.ten_dang_nhap)', mb_strtoupper($this->taikhoan_id)]);
            // dd($query->createCommand()->sql);
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
                'attribute'=>'ten_san_pham',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'tom_tat',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'mo_ta',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'anh_dai_dien',
                
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'noi_bat',
                
            ],
            // [
            //     'class'=>'\kartik\grid\DataColumn',
            //     'attribute'=>'thoi_gian_dang',
                
            // ],
            // [
                //     'class'=>'\kartik\grid\DataColumn',
                //     'attribute'=>'thoi_gian_dang',
                    
                // ],
            
            // [
            //     'class'=>'\kartik\grid\DataColumn',
            //     'attribute'=>'alias_title',
            // ],
            // [
            //     'class'=>'\kartik\grid\DataColumn',
            //     'attribute'=>'nganhnghe_id',
            //     'value' => 'dmNganhnghe.ten_nganh',
            //     'label' => 'Ngành nghề'
            // ],
            // [
            //     'class'=>'\kartik\grid\DataColumn',
            //     'attribute'=>'taikhoan_id',
            //     'value' => 'taikhoan.ten_dang_nhap',
            //     'label' => 'Tên đăng nhập'
            // ],      
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
                'attribute'=>'ten_san_pham',
                'value' =>function ($model, $key, $index, $widget) { 
                    
                    // return $model->noi_dung;
                    return strip_tags($model->ten_san_pham) ;
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
                'attribute'=>'mo_ta',
                'value' =>function ($model, $key, $index, $widget) { 
                    
                    
                    return strip_tags($model->mo_ta) ;
                },
                'format'=>'html',   
                'contentOptions' => [
                    'style'=>' overflow: auto; word-wrap: break-word;white-space:pre-line;'
                ],
               
            ],
            
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'anh_dai_dien',
                'format'=>'raw',

                'value' => function ($data) {
                       $url = Yii::$app->homeUrl.'../uploads/file/hinhsanpham/'.$data->anh_dai_dien;
                       return Html::img($url, ['alt'=>'myImage','width'=>'70','height'=>'50']);
                }
            ],
           
            // [
                // 'class'=>'\kartik\grid\DataColumn',
            //     'attribute'=>'thoi_gian_dang',
               
            //     'value' => function ($model, $key, $index, $widget) { 
            //         return date("d-m-Y", strtotime($model->thoi_gian_dang));
            //     },       
                
            // ],
            // [
                // 'class'=>'\kartik\grid\DataColumn',
            //     'attribute'=>'thoi_gian_sua',
               
            //     'value' => function ($model, $key, $index, $widget) { 
            //         return date("d-m-Y", strtotime($model->thoi_gian_sua));
            //     },       
                
            // ],
            [
                'class'=>'\kartik\grid\DataColumn',               
                'attribute'=>'nganhnghe_id',
                'value' => 'dmnganhnghe.ten_nganh',
                'label' => 'Ngành nghề',
               
                 'filter' => Html::activeDropDownList($searchModel,'nganhnghe_id',ArrayHelper::map(DmNganhNghe::find()->asArray()->all(),'id','ten_nganh'),['class' =>'form-control','prompt'=>'Chọn']),
            ],
            // [
            //     'class'=>'\kartik\grid\DataColumn',              
            //     'attribute'=>'taikhoan_id',
            //     'value' => 'taikhoan.ten_dang_nhap',
            //     'label' => 'Tên đăng nhập'
            // ],  
            [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'gia_san_pham',
                    
                
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

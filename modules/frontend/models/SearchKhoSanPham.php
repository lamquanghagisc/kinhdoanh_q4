<?php

namespace app\modules\backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\KhoSanPham;
use yii\data\Sort;

/**
 * SearchKhoSanPham represents the model behind the search form about `app\modules\backend\models\KhoSanPham`.
 */
class SearchKhoSanPham extends KhoSanPham
{
    public $sanpham;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sanpham_id', 'gia_mua_vnd', 'gia_mua_aud'], 'integer'],
            [['ngay_nhap_kho', 'ngay_xuat_kho', 'nguoi_nhap_kho', 'ngay_het_han'], 'safe'],
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
        $query = KhoSanPham::find()->where(['status' => $this->ACTIVE]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'sanpham_id' => $this->sanpham_id,
            'ngay_nhap_kho' => $this->ngay_nhap_kho,
            'ngay_xuat_kho' => $this->ngay_xuat_kho,
            'gia_mua_vnd' => $this->gia_mua_vnd,
            'gia_mua_aud' => $this->gia_mua_aud,
            'ngay_het_han' => $this->ngay_het_han,
        ]);

        $query->andFilterWhere(['like', 'upper(nguoi_nhap_kho)', mb_strtoupper($this->nguoi_nhap_kho)])
            ->andFilterWhere(['like', 'upper(san_pham.ten)', mb_strtoupper($this->sanpham)]);

        return $dataProvider;
    }

    public function getExportColumns()
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
            ],
            'id',
        [
            'attribute' => 'sanpham_id',
            'value' => function ($model){
                return $model->sanpham->ten;
            }
        ],
        'ngay_nhap_kho',
        'ngay_xuat_kho',
        'gia_mua_vnd',
        'gia_mua_aud',
        'nguoi_nhap_kho',
        'ngay_het_han',        ];
    }
}

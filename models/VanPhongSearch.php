<?php

namespace app\models;

use app\models\VanPhong;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use function mb_strtoupper;

/**
 * VanPhongSearch represents the model behind the search form about `app\models\VanPhong`.
 */
class VanPhongSearch extends VanPhong {

    /**
     * @inheritdoc
     */
      public function rules() {
        return [
            [['ten_vanphong', 'so_nha', 'ten_duong', 'ten_phuong', 'coquan_quanly', 'geom', 'ghi_chu', 'chu_dau_tu', 'quy_mo', 'tien_ich', 'dien_thoai'], 'string'],
            [['tien_phi'], 'number'],
            [['dien_tich'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = VanPhong::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id_vanphong' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_vanphong' => $this->id_vanphong,
            'tien_phi' => $this->tien_phi,
            'dien_tich' => $this->dien_tich,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_vanphong)', mb_strtoupper($this->ten_vanphong)])
                ->andFilterWhere(['like', 'upper(dien_thoai)', mb_strtoupper($this->dien_thoai)])
                ->andFilterWhere(['like', 'upper(chu_dau_tu)', mb_strtoupper($this->chu_dau_tu)])
                ->andFilterWhere(['like', 'upper(so_nha)', mb_strtoupper($this->so_nha)])
                ->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($this->ten_duong)])
                ->andFilterWhere(['=', 'upper(ten_phuong)', mb_strtoupper($this->ten_phuong)])
                ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)]);
        return $dataProvider;
    }

}

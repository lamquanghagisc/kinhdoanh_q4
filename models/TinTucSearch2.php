<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TinTuc;

/**
 * TinTucSearch represents the model behind the search form of `app\models\TinTuc`.
 */
class TinTucSearch extends TinTuc
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tintuc', 'loaitin_id', 'taikhoan_id'], 'integer'],
            [['tieu_de', 'duong_dan', 'noi_dung', 'thoi_gian_dang', 'tom_tat', 'alias_title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_tintuc' => $this->id_tintuc,
            'thoi_gian_dang' => $this->thoi_gian_dang,
            'loaitin_id' => $this->loaitin_id,
            'taikhoan_id' => $this->taikhoan_id,
        ]);

        $query->andFilterWhere(['ilike', 'tieu_de', $this->tieu_de])
            ->andFilterWhere(['ilike', 'duong_dan', $this->duong_dan])
            ->andFilterWhere(['ilike', 'noi_dung', $this->noi_dung])
            ->andFilterWhere(['ilike', 'tom_tat', $this->tom_tat])
            ->andFilterWhere(['ilike', 'alias_title', $this->alias_title]);

        return $dataProvider;
    }
}

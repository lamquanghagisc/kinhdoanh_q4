<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DmLinhvuc;

/**
 * DmLinhvucSearch represents the model behind the search form about `app\models\DmLinhvuc`.
 */
class DmLinhvucSearch extends DmLinhvuc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_linhvuc'], 'integer'],
            [['ten_linhvuc', 'ghi_chu'], 'safe'],
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
        $query = DmLinhvuc::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_linhvuc' => $this->id_linhvuc,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_linhvuc)', mb_strtoupper($this->ten_linhvuc)])
            ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)]);

        return $dataProvider;
    }
}

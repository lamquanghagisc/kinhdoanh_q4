<?php

namespace app\modules\backend\models\categories;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\categories\NhomSanPham;

/**
 * SearchNhomSanPham represents the model behind the search form about `app\modules\backend\models\categories\NhomSanPham`.
 */
class SearchNhomSanPham extends NhomSanPham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ten', 'ghi_chu', 'status'], 'safe'],
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
        $query = NhomSanPham::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'upper(id)', mb_strtoupper($this->id)])
            ->andFilterWhere(['like', 'upper(ten)', mb_strtoupper($this->ten)])
            ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)])
            ->andFilterWhere(['like', 'upper(status)', mb_strtoupper($this->status)]);

        return $dataProvider;
    }

    public function getExportColumns()
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
            ],
            'id',
        'ten',
        'ghi_chu',
        'status',        ];
    }
}

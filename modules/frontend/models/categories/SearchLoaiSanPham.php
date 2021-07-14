<?php

namespace app\modules\backend\models\categories;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\categories\LoaiSanPham;

/**
 * SearchLoaiSanPham represents the model behind the search form about `app\modules\backend\models\categories\LoaiSanPham`.
 */
class SearchLoaiSanPham extends LoaiSanPham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhomsanpham_id'], 'integer'],
            [['ten', 'ghi_chu'], 'safe'],
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
        $query = LoaiSanPham::find();

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
            'nhomsanpham_id' => $this->nhomsanpham_id,
        ]);

        $query->andFilterWhere(['like', 'upper(ten)', mb_strtoupper($this->ten)])
            ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)]);

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
        'nhomsanpham_id',        ];
    }
}

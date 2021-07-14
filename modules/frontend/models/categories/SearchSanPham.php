<?php

namespace app\modules\backend\models\categories;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\categories\SanPham;

/**
 * SearchSanPham represents the model behind the search form about `app\modules\backend\models\categories\SanPham`.
 */
class SearchSanPham extends SanPham
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hangsanxuat_id', 'loaisanpham_id'], 'integer'],
            [['ten', 'ghi_chu', 'status', 'quy_cach'], 'safe'],
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
        $query = SanPham::find()->where(['status' => $this->ACTIVE]);

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
            'hangsanxuat_id' => $this->hangsanxuat_id,
            'loaisanpham_id' => $this->loaisanpham_id,
        ]);

        $query->andFilterWhere(['like', 'upper(ten)', mb_strtoupper($this->ten)])
            ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)])
            ->andFilterWhere(['like', 'upper(status)', mb_strtoupper($this->status)])
            ->andFilterWhere(['like', 'upper(quy_cach)', mb_strtoupper($this->quy_cach)]);

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
        'hangsanxuat_id',
        'loaisanpham_id',
        'status',
        'quy_cach',        ];
    }
}

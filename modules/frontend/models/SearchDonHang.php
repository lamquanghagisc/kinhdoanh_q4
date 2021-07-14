<?php

namespace app\modules\backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend\models\DonHang;

/**
 * SearchDonHang represents the model behind the search form about `app\modules\backend\models\DonHang`.
 */
class SearchDonHang extends DonHang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'khachhang_id', 'tong_so_tien'], 'integer'],
            [['ngay_ban'], 'safe'],
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
        $query = DonHang::find();

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
            'khachhang_id' => $this->khachhang_id,
            'ngay_ban' => $this->ngay_ban,
            'tong_so_tien' => $this->tong_so_tien,
        ]);

        return $dataProvider;
    }

    public function getExportColumns()
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
            ],
            'id',
        'khachhang_id',
        'ngay_ban',
        'tong_so_tien',        ];
    }
}

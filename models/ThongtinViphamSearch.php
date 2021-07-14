<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VHokdVipham;

/**
 * ThongtinViphamSearch represents the model behind the search form about `app\models\VHokdVipham`.
 */
class ThongtinViphamSearch extends VHokdVipham {

    /**
     * @inheritdoc
     */
    public $tu_ngaylap;
    public $den_ngaylap;

    public function rules() {
        return [
            [['cuahang_id', 'von_kd', 'id_nn', 'gioi_tinh', 'id_ttvp'], 'integer'],
            [['tu_ngaylap', 'den_ngaylap'], 'safe'],
            [['ten_hkd', 'dien_thoai', 'fax', 'email', 'nganh_nghe', 'website', 'dai_dien', 'dan_toc', 'ngay_sinh', 'quoc_tich', 'cmnd', 'ngay_cap', 'noi_cap', 'hokhau_thuongtru', 'noisong_hientai', 'so_nha', 'ten_duong', 'ten_phuong', 'vi_tri', 'giayphep_so', 'ghi_chu', 'tinh_trang', 'geom', 'giayphep_ngay', 'ten_quan', 'tu_ngay', 'den_ngay', 'ma_thue', 'noidung_vipham', 'quyetdinh_so', 'quyetdinh_ngay', 'hinhthuc_phat', 'bienban_so', 'donvi_lap', 'donvi_qd', 'ngay_lap'], 'safe'],
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
        $query = VHokdVipham::find();

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
            'cuahang_id' => $this->cuahang_id,
            'von_kd' => $this->von_kd,
            'ngay_sinh' => $this->ngay_sinh,
            'ngay_cap' => $this->ngay_cap,
            'id_nn' => $this->id_nn,
            'giayphep_ngay' => $this->giayphep_ngay,
            'gioi_tinh' => $this->gioi_tinh,
            'quyetdinh_ngay' => date('Y-m-d', strtotime(str_replace('/','-',$this->quyetdinh_ngay))),
            'ngay_lap' => $this->ngay_lap,
            'id_ttvp' => $this->id_ttvp,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_hkd)', mb_strtoupper($this->ten_hkd)])
                ->andFilterWhere(['like', 'upper(dien_thoai)', mb_strtoupper($this->dien_thoai)])
                ->andFilterWhere(['like', 'upper(fax)', mb_strtoupper($this->fax)])
                ->andFilterWhere(['like', 'upper(email)', mb_strtoupper($this->email)])
                ->andFilterWhere(['like', 'upper(nganh_nghe)', mb_strtoupper($this->nganh_nghe)])
                ->andFilterWhere(['like', 'upper(website)', mb_strtoupper($this->website)])
                ->andFilterWhere(['like', 'upper(dai_dien)', mb_strtoupper($this->dai_dien)])
                ->andFilterWhere(['like', 'upper(dan_toc)', mb_strtoupper($this->dan_toc)])
                ->andFilterWhere(['like', 'upper(quoc_tich)', mb_strtoupper($this->quoc_tich)])
                ->andFilterWhere(['like', 'upper(cmnd)', mb_strtoupper($this->cmnd)])
                ->andFilterWhere(['like', 'upper(noi_cap)', mb_strtoupper($this->noi_cap)])
                ->andFilterWhere(['like', 'upper(hokhau_thuongtru)', mb_strtoupper($this->hokhau_thuongtru)])
                ->andFilterWhere(['like', 'upper(noisong_hientai)', mb_strtoupper($this->noisong_hientai)])
                ->andFilterWhere(['like', 'upper(so_nha)', mb_strtoupper($this->so_nha)])
                ->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($this->ten_duong)])
                ->andFilterWhere(['like', 'upper(ten_phuong)', mb_strtoupper($this->ten_phuong)])
                ->andFilterWhere(['like', 'upper(vi_tri)', mb_strtoupper($this->vi_tri)])
                ->andFilterWhere(['like', 'upper(giayphep_so)', mb_strtoupper($this->giayphep_so)])
                ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)])
                ->andFilterWhere(['like', 'upper(tinh_trang)', mb_strtoupper($this->tinh_trang)])
                ->andFilterWhere(['like', 'upper(geom)', mb_strtoupper($this->geom)])
                ->andFilterWhere(['like', 'upper(ten_quan)', mb_strtoupper($this->ten_quan)])
                ->andFilterWhere(['like', 'upper(ma_thue)', mb_strtoupper($this->ma_thue)])
                ->andFilterWhere(['like', 'upper(noidung_vipham)', mb_strtoupper($this->noidung_vipham)])
                ->andFilterWhere(['like', 'upper(quyetdinh_so)', mb_strtoupper($this->quyetdinh_so)])
                ->andFilterWhere(['like', 'upper(hinhthuc_phat)', mb_strtoupper($this->hinhthuc_phat)])
                ->andFilterWhere(['like', 'upper(bienban_so)', mb_strtoupper($this->bienban_so)])
                ->andFilterWhere(['like', 'upper(donvi_lap)', mb_strtoupper($this->donvi_lap)])
                ->andFilterWhere(['like', 'upper(donvi_qd)', mb_strtoupper($this->donvi_qd)]);
        if ($this->tu_ngay != null && $this->den_ngay != null) {
            $query->andWhere("ngay_lap between '" . date('Y-m-d', strtotime(str_replace('/','-',$this->tu_ngay))) . "' and '" . date('Y-m-d', strtotime(str_replace('/','-',$this->den_ngay))) . "'");
        }
        return $dataProvider;
    }

}

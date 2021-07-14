<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "don_hang".
 *
 * @property int $id
 * @property int $khachhang_id Khách hàng
 * @property string|null $ngay_ban Ngày bán
 * @property int|null $tong_so_tien Tổng số tiền
 * @property int|null $status
 *
 * @property KhachHang $khachhang
 * @property DonhangSanpham[] $donhangSanphams
 */
class DonHang extends \app\modules\backend\base\BaseModel
{

    const SCENARIO_CREATE = 'create';
    const SCENARIO_DELETE = 'delete';
    const SCENARIO_UPDATE = 'update';

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = ['khachhang_id', 'ngay_ban', 'status'];
        $scenarios[self::SCENARIO_UPDATE] = ['khachhang_id', 'ngay_ban'];
        $scenarios[self::SCENARIO_DELETE] = ['status'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'don_hang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['khachhang_id','ngay_ban'], 'required','message' => '"{attribute}" không được để trống!'],
            [['khachhang_id', 'tong_so_tien', 'status'], 'integer'],
            [['ngay_ban'], 'safe'],
            [['khachhang_id'], 'exist', 'skipOnError' => true, 'targetClass' => KhachHang::className(), 'targetAttribute' => ['khachhang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'khachhang_id' => 'Khách hàng',
            'ngay_ban' => 'Ngày bán',
            'tong_so_tien' => 'Tổng số tiền',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Khachhang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKhachhang()
    {
        return $this->hasOne(KhachHang::className(), ['id' => 'khachhang_id']);
    }

    /**
     * Gets query for [[DonhangSanphams]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonhangSanphams()
    {
        return $this->hasMany(DonhangSanpham::className(), ['donhang_id' => 'id']);
    }
}

<?php

namespace app\modules\backend\models;

use Yii;

/**
 * This is the model class for table "khach_hang".
 *
 * @property int $id
 * @property string|null $ten Tên
 * @property string|null $dien_thoai Điện thoại
 * @property string|null $facebook Facebook
 * @property string|null $dia_chi Địa chỉ
 * @property string|null $ghi_chu Ghi chú
 *
 * @property DonHang[] $donHangs
 */
class KhachHang extends \app\modules\backend\base\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'khach_hang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ten', 'dien_thoai', 'facebook'], 'string', 'max' => 100],
            [['dia_chi', 'ghi_chu'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên',
            'dien_thoai' => 'Điện thoại',
            'facebook' => 'Facebook',
            'dia_chi' => 'Địa chỉ',
            'ghi_chu' => 'Ghi chú',
        ];
    }

    /**
     * Gets query for [[DonHangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonHangs()
    {
        return $this->hasMany(DonHang::className(), ['khachhang_id' => 'id']);
    }
}

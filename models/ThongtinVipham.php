<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thongtin_vipham".
 *
 * @property integer $id_ttvp
 * @property string $noidung_vipham
 * @property string $quyetdinh_so
 * @property string $quyetdinh_ngay
 * @property string $hinhthuc_phat
 * @property string $ghi_chu
 * @property string $bienban_so
 * @property string $donvi_lap
 * @property string $donvi_qd
 * @property string $ngay_lap
 * @property integer $hkd_id
 *
 * @property HoKinhDoanh $hkd
 */
class ThongtinVipham extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thongtin_vipham';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['noidung_vipham', 'quyetdinh_so', 'hinhthuc_phat', 'ghi_chu', 'bienban_so', 'donvi_lap', 'donvi_qd'], 'string'],
            [['quyetdinh_ngay', 'ngay_lap'], 'safe'],
            [['hkd_id'], 'integer'],
            [['hkd_id'], 'exist', 'skipOnError' => true, 'targetClass' => HoKinhDoanh::className(), 'targetAttribute' => ['hkd_id' => 'id_hkd']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ttvp' => 'Id Ttvp',
            'noidung_vipham' => 'Thông tin vi phạm',
            'quyetdinh_so' => 'Số quyết định',
            'quyetdinh_ngay' => 'Ngày ra quyết định',
            'hinhthuc_phat' => 'Hình thức xử phạt',
            'ghi_chu' => 'Ghi chú',
            'bienban_so' => 'Số biên bản',
            'donvi_lap' => 'Đơn vị lập biên bản',
            'donvi_qd' => 'Đơn vị ra quyết định',
            'ngay_lap' => 'Ngày lập',
            'hkd_id' => 'Hkd ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHkd()
    {
        return $this->hasOne(HoKinhDoanh::className(), ['id_hkd' => 'hkd_id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "giao_thong".
 *
 * @property integer $gid
 * @property string $objectid
 * @property string $tenduong
 * @property string $chieudai
 * @property string $viahe_trai
 * @property string $dorong
 * @property string $daypc_dai
 * @property string $daypc_rong
 * @property string $viahe_phai
 * @property string $dientich
 * @property string $ketcaumd
 * @property string $loaiduong
 * @property string $namxaydung
 * @property string $namduytu
 * @property string $taitrong
 * @property string $logioi_qh
 * @property string $ghichu
 * @property integer $motchieu
 * @property string $capquanly
 * @property string $dv_quanly
 * @property string $tinhtrang
 * @property string $solan
 * @property integer $capduong
 * @property integer $checked
 * @property string $shape_leng
 * @property string $geom
 */
class GiaoThong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'giao_thong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['objectid', 'chieudai', 'dorong', 'daypc_dai', 'dientich', 'taitrong', 'solan', 'shape_leng'], 'number'],
            [['motchieu', 'capduong', 'checked'], 'integer'],
            [['geom'], 'string'],
            [['tenduong'], 'string', 'max' => 100],
            [['viahe_trai', 'daypc_rong', 'viahe_phai', 'ketcaumd', 'loaiduong', 'namxaydung', 'namduytu', 'logioi_qh', 'ghichu', 'capquanly', 'dv_quanly'], 'string', 'max' => 50],
            [['tinhtrang'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'objectid' => 'Objectid',
            'tenduong' => 'Tenduong',
            'chieudai' => 'Chieudai',
            'viahe_trai' => 'Viahe Trai',
            'dorong' => 'Dorong',
            'daypc_dai' => 'Daypc Dai',
            'daypc_rong' => 'Daypc Rong',
            'viahe_phai' => 'Viahe Phai',
            'dientich' => 'Dientich',
            'ketcaumd' => 'Ketcaumd',
            'loaiduong' => 'Loaiduong',
            'namxaydung' => 'Namxaydung',
            'namduytu' => 'Namduytu',
            'taitrong' => 'Taitrong',
            'logioi_qh' => 'Logioi Qh',
            'ghichu' => 'Ghichu',
            'motchieu' => 'Motchieu',
            'capquanly' => 'Capquanly',
            'dv_quanly' => 'Dv Quanly',
            'tinhtrang' => 'Tinhtrang',
            'solan' => 'Solan',
            'capduong' => 'Capduong',
            'checked' => 'Checked',
            'shape_leng' => 'Shape Leng',
            'geom' => 'Geom',
        ];
    }
}

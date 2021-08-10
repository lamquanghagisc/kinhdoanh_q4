<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SanPham]].
 *
 * @see SanPham
 */
class SanPhamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SanPham[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SanPham|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

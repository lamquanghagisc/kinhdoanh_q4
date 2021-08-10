<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DmNganhNghe]].
 *
 * @see DmNganhNghe
 */
class NganhNgheQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DmNganhNghe[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DmNganhNghe|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

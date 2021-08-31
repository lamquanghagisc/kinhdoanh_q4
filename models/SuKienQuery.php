<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SuKien]].
 *
 * @see SuKien
 */
class SuKienQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SuKien[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SuKien|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

<?php

namespace lslsoft\poll\models;

/**
 * This is the ActiveQuery class for [[Polls]].
 *
 * @see Polls
 */
class PollsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Polls[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Polls|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

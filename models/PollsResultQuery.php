<?php

namespace lslsoft\poll\models;

/**
 * This is the ActiveQuery class for [[PollsResult]].
 *
 * @see PollsResult
 */
class PollsResultQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PollsResult[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PollsResult|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

<?php

namespace lslsoft\poll\models;

/**
 * This is the ActiveQuery class for [[PollsAnswers]].
 *
 * @see PollsAnswers
 */
class PollsAnswersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return PollsAnswers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PollsAnswers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

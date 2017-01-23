<?php

namespace lslsoft\poll\models;

use Yii;

/**
 * This is the model class for table "polls_result".
 *
 * @property integer $num
 * @property integer $id_poll
 * @property integer $id_answer
 * @property integer $id_user
 */
class PollsResult extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */

    /**
     * @const field allow_multiple in polls is true
     */
    public $res;

    const SCENARIO_MULTIPLE = 'allow_multiple';

    /**
     * @const field allow_multiple in polls is false
     */
    const SCENARIO_SINGLE = 'not_allow_multiple';

    /**
     * @const can vote without sign up
     * 
     */
    const SCENARIO_ANONYMOUS = 'anonymous';

    public static function tableName() {
        return 'polls_result';
    }

    /**
     * @inheritdoc
     * 
     */
    public function rules() {
        return [
            [['num', 'id_poll', 'id_answer', 'id_user'], 'integer', 'on' => 'default'],
            [['id_poll', 'id_answer', 'id_user'], 'required', 'on' => 'default'],
            [['create_at'], 'date', 'format' => 'php:Y-m-d H:i:s', 'on' => ['default', self::SCENARIO_ANONYMOUS]],
            [['ip'], 'ip', 'on' => ['default', self::SCENARIO_ANONYMOUS]],
            [['host'], 'string', 'length' => [0, 20], 'on' => ['default', self::SCENARIO_ANONYMOUS]],
            [['num', 'id_poll', 'id_answer'], 'integer', 'on' => self::SCENARIO_ANONYMOUS],
            [['id_poll', 'id_answer'], 'required', 'on' => self::SCENARIO_ANONYMOUS],
        ];
    }

    /**
     * @inheritdoc
     * @todo change 'app'/'polls'
     */
    public function attributeLabels() {
        return [
            'num' => Yii::t('polls', 'Number of answers'),
            'id_poll' => Yii::t('polls', '№ poll'),
            'id_answer' => Yii::t('polls', '№ answer'),
            'id_user' => Yii::t('polls', 'Id User'),
            'create_at' => Yii::t('polls', 'Created at'),
            'ip' => Yii::t('polls', 'User IP'),
            'host' => Yii::t('polls', 'User host')
        ];
    }

    /**
     * @inheritdoc
     * @return PollsResultQuery the active query used by this AR class.
     */
    public static function find() {
        return new PollsResultQuery(get_called_class());
    }

    /**
     * Return record from polls_answer with predefined id
     * @return type PollAnswer
     */
    public function getIdAnswer() {
        return $this->hasOne(PollsAnswers::className(), ['id' => 'id_answer']);
    }

    /**
     * Return text of answer
     * @return type string
     */
    public function getAnswer() {
        return $this->idAnswer->answer;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser() {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * Return all polls results for certain poll
     * @param type $id_poll 
     * @return type
     */
    public static function getPollsId($id_poll) {
        return self::find()
                        ->where('id_poll=:id_poll', ['id_poll' => $id_poll])
                        ->all();
    }

    /**
     * Return max value of field num -
     * amount of voting for multiple answers
     * @param type $id_poll integer - 
     * @return type integer
     */
    public static function getMaxNum($id_poll) {
        return self::find()
                        ->where('id_poll=:id_poll', ['id_poll' => $id_poll])
                        ->max('num');
    }

    /**
     * Return joined number of records
     * @param integer $id_poll
     * @return PollsResult set of records
     */
    public static function getResults($id_poll) {
        return self::find()
                        ->select('id_answer, count(`id_answer`) as `res`')
                        ->where(['polls_result.id_poll:=id_poll', ['id_poll' => $id_poll]])
                        ->joinWith('idAnswer')
                        ->groupBy(['id_answer']);
    }

}

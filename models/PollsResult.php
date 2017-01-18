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
     * @const
     * 
     */
    const SCENARIO_ANONYMOUS = 'anonymous';

    /**
     *
     * @property array for checkboxlist checked items
     * 
     * @todo make this property to work in form checkBoxList instead of 'id_poll'
     */
    //public $result;

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
     * 
     * @return scenario for 
     */
//    public function scenarios()
//    {
//        return [
//            'default' =>['num', 'id_poll', 'id_answer', 'id_user'],
//            self::SCENARIO_SINGLE => ['num', 'id_poll', 'id_answer', 'id_user'],
//            self::SCENARIO_MULTIPLE => ['num', 'id_poll', 'id_user'],
//        ];
//    }
    /**
     * @inheritdoc
     * @todo change 'app'/'polls'
     */
    public function attributeLabels() {
        return [
            'num' => Yii::t('app', 'Number of answers'),
            'id_poll' => Yii::t('app', '№ poll'),
            'id_answer' => Yii::t('app', '№ answer'),
            'id_user' => Yii::t('app', 'Id User'),
            'create_at' => Yii::t('app', 'Created at'),
            'ip' => Yii::t('app', 'User IP'),
            'host' => Yii::t('app', 'User host')
                // 'res' => Yii::t('app', 'User host'),
        ];
    }

    /**
     * @inheritdoc
     * @return PollsResultQuery the active query used by this AR class.
     */
    public static function find() {
        return new PollsResultQuery(get_called_class());
    }

    public function getIdAnswer() {
        return $this->hasOne(PollsAnswers::className(), ['id' => 'id_answer']);
    }

    public function getAnswer() {
        return $this->idAnswer->answer;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser() {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

}

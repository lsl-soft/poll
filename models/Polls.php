<?php

namespace lslsoft\poll\models;

use Yii;

/**
 * This is the model class for table "polls", 
 * which contains polls questions and main information
 *
 * @property integer $id
 * @property string $question
 * @property string $date_beg
 * @property string $date_end
 * @property integer $allow_mulitple
 * @property integer $is_random
 * @property integer $anonymous
 * @property integer $show_vote
 *
 * @property PollsAnswers[] $pollsAnswers
 */
class Polls extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'polls';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['question', 'date_beg', 'date_end', 'allow_mulitple', 'is_random', 'anonymous', 'show_vote'], 'required'],
            [['question'], 'string'],
            [['date_beg', 'date_end'], 'safe'],
            [['allow_multiple', 'is_random', 'anonymous', 'show_vote'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        /**
         * @todo change 'app'/'polls' for i18n
         */
        return [
            'id' => Yii::t('polls', '№ poll'),
            'question' => Yii::t('polls', 'Question'),
            'date_beg' => Yii::t('polls', 'Date begin'),
            'date_end' => Yii::t('polls', 'Date end'),
            'allow_multiple' => Yii::t('polls', 'Multiple answer'),
            'is_random' => Yii::t('polls', 'Random order'),
            'anonymous' => Yii::t('polls', 'Anonymous answers'),
            'show_vote' => Yii::t('polls', 'Show number of votes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollsAnswers() {
        return $this->hasMany(PollsAnswers::className(), ['id_poll' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PollsQuery the active query used by this AR class.
     */
    public static function find() {
        return new PollsQuery(get_called_class());
    }

    /**
     * Return polls which are active today (date_beg>=today <=date_end
     * @param type $date - today date
     */
    public static function getPollsDate($date) {
        return self::find()
                        ->where('date_beg<=:dateToday', ['dateToday' => $date])
                        ->andWhere('date_end>=:dateToday', ['dateToday' => $date])
                        ->all();
    }

    /**
     * Returns poll which is active today
     * @return type poll which is active today
     */
    public static function getPollToday() {
        return self::find()
                        ->where('date_beg<=:dateToday', ['dateToday' => date('Y-m-d')])
                        ->andWhere('date_end>=:dateToday', ['dateToday' => date('Y-m-d')])
                        ->one();
    }

    /**
     * Return poll according to id
     * @param type $id - id of poll
     * @return type poll 
     */
    public static function getIdPoll($id_poll) {
        return self::find()
                        ->where('id=:id_poll', ['id_poll' => $id_poll])
                        ->one();
    }

}

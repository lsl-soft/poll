<?php

namespace lslsoft\poll\models;

use Yii;

/**
 * This is the model class for table "polls".
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
class Polls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'date_beg', 'date_end', 'allow_mulitple', 'is_random', 'anonymous', 'show_vote'], 'required'],
            [['question'], 'string'],
            [['date_beg', 'date_end'], 'safe'],
            [['allow_mulitple', 'is_random', 'anonymous', 'show_vote'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№ poll'),
            'question' => Yii::t('app', 'Question'),
            'date_beg' => Yii::t('app', 'Date begin'),
            'date_end' => Yii::t('app', 'Date end'),
            'allow_mulitple' => Yii::t('app', 'multiple answer'),
            'is_random' => Yii::t('app', 'random order'),
            'anonymous' => Yii::t('app', 'anonymous answers'),
            'show_vote' => Yii::t('app', 'show number of votes'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPollsAnswers()
    {
        return $this->hasMany(PollsAnswers::className(), ['id_poll' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PollsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PollsQuery(get_called_class());
    }
    
    /**
     * Return polls which are active today (date_beg>=today <=date_end
     * @param type $date - today date
     */
    public static function getPollsDate($date) {
        return $this::find()
                ->where('date_beg<=:dateToday',['dateToday'=>$date])
                ->andWhere('date_end>=:dateToday',['dateToday'=>$date])
                ->all();
    }
    public static function getPollsToday() {
        return self::find()
                ->where('date_beg<=:dateToday',['dateToday'=>date('Y-m-d')])
                ->andWhere('date_end>=:dateToday',['dateToday'=>date('Y-m-d')])
                ->one();
    }
    
}

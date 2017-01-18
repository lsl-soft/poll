<?php

namespace lslsoft\poll\models;

use Yii;

/**
 * This is the model class for table "polls_answers".
 *
 * @property integer $id
 * @property integer $id_poll
 * @property string $answer
 *
 * @property Polls $idPoll 
 */
class PollsAnswers extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     * 
     *  working with polls
     */
    public static function tableName() {
        return 'polls_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['id_poll'], 'integer'],
                [['answer'], 'required'],
                [['answer'], 'string'],
                [['id_poll'], 'exist', 'skipOnError' => true, 'targetClass' => Polls::className(), 'targetAttribute' => ['id_poll' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('polls', '№ answer'),
            'id_poll' => Yii::t('polls', '№ poll'),
            'answer' => Yii::t('polls', 'Answer'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPoll() {
        return $this->hasOne(Polls::className(), ['id' => 'id_poll']);
    }

    /**
     * @inheritdoc
     * @return PollsAnswersQuery the active query used by this AR class.
     */
    public static function find() {
        return new PollsAnswersQuery(get_called_class());
    }

    

}

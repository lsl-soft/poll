<?php

namespace lslsoft\poll\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use lslsoft\poll\models\PollsAnswers;

/**
 * PollsAnswersSearch represents the model behind the search form about `frontend\models\PollsAnswers`.
 */
class PollsAnswersSearch extends PollsAnswers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_poll'], 'integer'],
            [['answer'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PollsAnswers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_poll' => $this->id_poll,
        ]);

        $query->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}

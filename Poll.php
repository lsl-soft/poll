<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lslsoft\poll;

use lslsoft\poll\models\Polls;
use lslsoft\poll\models\PollsResult;
use lslsoft\poll\models\PollsResultSearch;
use Yii;
use yii\base\Widget;

class Poll extends Widget {

    public $model;
    public $pollId;
    public $resultView;
    private $pollsProvider;

    public function init() {
        parent::init();
    }

    /**
     * Creates a new PollsResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    private function createResult($model) {
        $modelsaved = false;
        $answers = $model->id_answer;
        foreach ($answers as $id_answer) {
            $modelMulti = new PollsResult();
            $modelMulti->id_user = $model->id_user;
            $modelMulti->id_poll = $model->id_poll;
            $modelMulti->num = $model->num;
            $modelMulti->create_at = $model->create_at;
            $modelMulti->ip = $model->ip;
            $modelMulti->host = $model->host;
            $modelMulti->id_answer = $id_answer;

            if (!$modelMulti->save()) {
                $modelsaved = false;
                print_r($modelMulti->errors);
                return false;
            } else {

                $modelsaved = true;
            }
        }
        return $modelsaved;
    }

    /**
     * set $model properties
     * @param type $model
     * @return type $model - PollsResult
     */
    private function setModel($model) {
        $model->id_poll = $this->pollsProvider->id;
        $model->num = 1;
        $model->create_at = date("Y-m-d H:i:s");
        $model->ip = Yii::$app->request->getUserIP();
        $model->host = Yii::$app->request->getUserHost();
        if ($this->pollsProvider->anonymous) {
            $model->scenario = PollsResult::SCENARIO_ANONYMOUS;
            $model->id_user = 0;
        } else {
            if (!Yii::$app->user->isGuest) {
                $model->id_user = Yii::$app->user->getId();
            }
        }
        return $model;
    }

    /**
     * Return poll for voting
     * @return type Polls 
     */
    public function getProvider() {
        if (isset($this->pollId)) {
            return Polls::getPollId($this->pollId);
        } else {
            return Polls::getPollToday();
        }
    }

    /**
     * 
     * @return type
     */
    public function run() {
        // Register AssetBundle
        PollAsset::register($this->getView());

        $model = new PollsResult();
        $this->pollsProvider = $this->getProvider();
        if (!isset($this->pollsProvider))     {
            return;
            
        }
        $modelsaved = false;
        if ($model->load(Yii::$app->request->post())) {
            /**
             * fill attributes of model
             */
            $model = $this->setModel($model);
            /**
             * @todo I need do something with guest user. now i have user with ID=0;
             */
            if (is_array($model->id_answer)) {
                $modelsaved = $this->createResult($model);
            } else {
                $modelsaved = $model->save();
            }
        }
        if ($modelsaved) {
            if (!$this->pollsProvider->show_vote) {
                return;//if show result wasn't allowed nothing would happen
            }
            $searchModel = new PollsResultSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            if (isset($this->resultView)) {
                if ($this->resultView === 'table') {
                    return \Yii::$app->controller->renderPartial('@lslsoft/poll/views/table', ['dataProvider' => $dataProvider,
                                'searchModel' => $searchModel,
                                'question' => $this->pollsProvider->question]); //, 'id' => $model->getPrimaryKey()]);}  
                }
            }
            return \Yii::$app->controller->renderPartial('@lslsoft/poll/views/chart', ['dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                        'question' => $this->pollsProvider->question]); //, 'id' => $model->getPrimaryKey()]);}
        } else {

            return \Yii::$app->controller->renderPartial('@lslsoft/poll/views/create', [
                        'model' => $model,
                        'pollsProvider' => $this->pollsProvider,]);
        }
    }

}

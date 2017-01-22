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

    /**
     * Model for poll results
     * @var type 
     */
    private $model;

    /**
     * Define id_poll which poll will be questioned
     * @var integer
     */
    public $idPoll;

    /**
     * Define how to show results: chart or table
     * @var type string
     */
    public $resultView;

    /**
     * Contain poll for which voting will be organized
     * @var type Polls
     */
    private $pollsProvider;

    public function init() {
        parent::init();
    }

    /**
     * Creates a new PollsResult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    private function createResult() {
        $modelsaved = false;
        $answers = $this->model->id_answer;
        foreach ($answers as $id_answer) {
            $modelMulti = new PollsResult();
            $modelMulti->id_user = $this->model->id_user;
            $modelMulti->id_poll = $this->model->id_poll;
            $modelMulti->num = $this->model->num;
            $modelMulti->create_at = $this->model->create_at;
            $modelMulti->ip = $this->model->ip;
            $modelMulti->host = $this->model->host;
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

//    private function createResult($model) {
//        $modelsaved = false;
//        $answers = $model->id_answer;
//        foreach ($answers as $id_answer) {
//            $modelMulti = new PollsResult();
//            $modelMulti->id_user = $model->id_user;
//            $modelMulti->id_poll = $model->id_poll;
//            $modelMulti->num = $model->num;
//            $modelMulti->create_at = $model->create_at;
//            $modelMulti->ip = $model->ip;
//            $modelMulti->host = $model->host;
//            $modelMulti->id_answer = $id_answer;
//
//            if (!$modelMulti->save()) {
//                $modelsaved = false;
//                print_r($modelMulti->errors);
//                return false;
//            } else {
//
//                $modelsaved = true;
//            }
//        }
//        return $modelsaved;
//    }

    /**
     * set $model properties
     * @param type $model
     * @return type $model - PollsResult
     */
    private function setModel() {
        $this->model->id_poll = $this->pollsProvider->id;
        $this->model->num = PollsResult::getMaxNum($this->pollsProvider->id);
        if (!isset($this->model->num)) {
            $this->model->num = 1;
        } else {
            $this->model->num++;
        }
        $this->model->create_at = date("Y-m-d H:i:s");
        $this->model->ip = Yii::$app->request->getUserIP();
        $this->model->host = Yii::$app->request->getUserHost();
        if ($this->pollsProvider->anonymous) {
            $this->model->scenario = PollsResult::SCENARIO_ANONYMOUS;
            $this->model->id_user = 0;
        } else {
            if (!Yii::$app->user->isGuest) {
                $this->model->id_user = Yii::$app->user->getId();
            }
        }
        //return $this->model;
    }

//    private function setModel($model) {
//        $model->id_poll = $this->pollsProvider->id;
//        $model->num = 1;
//        $model->create_at = date("Y-m-d H:i:s");
//        $model->ip = Yii::$app->request->getUserIP();
//        $model->host = Yii::$app->request->getUserHost();
//        if ($this->pollsProvider->anonymous) {
//            $model->scenario = PollsResult::SCENARIO_ANONYMOUS;
//            $model->id_user = 0;
//        } else {
//            if (!Yii::$app->user->isGuest) {
//                $model->id_user = Yii::$app->user->getId();
//            }
//        }
//        return $model;
//    }

    /**
     * Return poll for voting
     * @return type Polls 
     */
    public function getProvider() {
        if (isset($this->idPoll)) {
            return Polls::getIdPoll($this->idPoll);
        } else {
            $pollVote = Polls::getPollToday();
            if (isset($pollVote)) {
                $this->idPoll = $pollVote->id_poll;
            }
            return $pollVote;
        }
    }

    /**
     * 
     * @return type
     */
    public function run() {
        // Register AssetBundle
        PollAsset::register($this->getView());

        $this->model = new PollsResult();
        $this->pollsProvider = $this->getProvider();
        if (!isset($this->pollsProvider)) {
            return;
        }
        $modelsaved = false;
        if ($this->model->load(Yii::$app->request->post())) {
            $this->setModel();
            /**
             * @todo I need do something with guest user. now i have user with ID=0;
             */
            if (is_array($this->model->id_answer)) {
                $modelsaved = $this->createResult();
            } else {
                $modelsaved = $this->model->save();
            }
        }
        if (!$modelsaved) {
            return \Yii::$app->controller->renderPartial('@vendor/lslsoft/yii2-poll/views/create', [
                        'model' => $this->model,
                        'pollsProvider' => $this->pollsProvider,]);
        }

        if (!$this->pollsProvider->show_vote) {
            return; //if show result wasn't allowed nothing would happen
        }
        $searchModel = new PollsResultSearch();

        // $dataProvider = PollsResult::getResults($this->idPoll);//
        $dataProvider = $searchModel->search(['id_poll' => $this->idPoll]); //$searchModel->search(Yii::$app->request->queryParams);
        if (!isset($this->resultView)) {
            return \Yii::$app->controller->renderPartial('@vendor/lslsoft/yii2-poll/views/chart', ['dataProvider' => $dataProvider,
                        'searchModel' => $searchModel,
                        'question' => $this->pollsProvider->question,
                        'sumRes' => $this->model->num]);
        }

        return \Yii::$app->controller->renderPartial('@vendor/lslsoft/yii2-poll/views/table', ['dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'question' => $this->pollsProvider->question,
                    'sumRes' => $this->model->num]);
    }

}

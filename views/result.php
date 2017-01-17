<?php
/**
 * show the results of polls
 * simple bar chart
 */
//use frontend\widgets\pollwidget\models\Polls;
//use frontend\widgets\pollwidget\models\PollsAnswers;
//use frontend\widgets\pollwidget\models\PollsResult;
//use frontend\widgets\pollwidget\models\PollsResultSearch;


use yii\bootstrap\Progress;
use yii\grid\GridView;
use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="polls-result-show">

    <h1><?= Html::encode(Yii::t('polls',"It's the results of our poll")) ?></h1>

    <?

    /**
     * first, get results
     */
    // $dataProvider = new PollsResult;
    // $searchModel = new PollsResultSearch;

    function cmp($a, $b) {
        if ($a['res'] == $b['res']) {
            return 0;
        }
        return ($a['res'] > $b['res']) ? -1 : 1;
    }


    $model = $dataProvider->getModels();
    $res = array();


    foreach ($model as $answer) {

        $res[] = ['answer' => $answer->idAnswer->answer, 'res' => $answer->res];

    }

  

    usort($res, "cmp");

    

    $maxval = intval($res[0]['res']);
    foreach ($res as $val) {
        echo "<h3>".Yii::t('polls',$val['answer'])."  ".$val['res']. "</h3>";
        echo Progress::widget([
            'percent' => intval($val['res']) / $maxval * 100,
            //'label' => $val['answer'],
        ]);
    }
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//                ['attribute' => 'idAnswer',
//                'value' => 'idAnswer.answer'],
            'idAnswer.answer',
            //'answer',
            // 'num',
            // 'id_poll',
            //  'idAnswer',
            //   'id_answer',
            'res',
//           [ 'attribute'=>'res',
//               'value'=>'res'],
        //     ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
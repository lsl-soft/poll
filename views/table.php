<?php


use yii\grid\GridView;
use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="polls-result-show">
    <h2><?= Html::encode(Yii::t('polls',$question)) ?></h2>
    <h3><?= Html::encode(Yii::t('polls', "The results of the poll")) ?></h3>

    <?
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'idAnswer.answer',
                'value' => 'idAnswer.answer',
                'label' => Yii::t('polls', 'Answer')],
                ['attribute' => 'res',
                'value' => 'res',
                'label' => Yii::t('polls', 'Results')],
        ],
    ]);
    ?>

</div>


<?php

use lslsoft\poll\models\PollsAnswers;
use lslsoft\poll\models\PollsResult;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper

/* @var $this View */
/* @var $model PollsResult */
/* @var $form ActiveForm */
?>


<?php 
/**
 * translate temporary element to current language
 * @param type $text element of array to translate
 * @return type translated element
 */
function translate($text){
    $ret=Yii::t('polls',$text);
    return $ret;
}
?>
<div class="polls-result-form">


    <?php $form = ActiveForm::begin(['id' => 'pollForm']); ?>

    <?
    echo "<h1>" . Yii::t('polls', $pollsProvider->question) . "</h1>";

    $answersProvider = PollsAnswers::find()
            ->where('id_poll=:id', ['id' => $pollsProvider->id])
            ->all();
    $answer1 = ArrayHelper::map($answersProvider, 'id', 'answer');
    $answer =array_map('translate',$answer1);
    

    if ($pollsProvider->allow_mulitple) {
        echo $form->field($model, 'id_answer')
                ->checkBoxList($answer, ['separator' => '</br>'])
                ->label(false);
    } else {
        echo $form->field($model, 'id_answer')
                ->radioList($answer, ['separator' => '</br>'])
                ->label(false);
    }
    ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('polls', 'Send') : Yii::t('polls', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>

<?php

/**
 * using in creation voting
 * two variants =
 * 1)multiple_answers=true - a bunch of checkboxes will be displayed
 * 2)multiple_answers=false - a bunch of radiobuttons will be displayed
 */
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
 * Shuffle associative array with preserving keys
 * @param type $list array for shuffle
 * @return type array after shuffle
 */

function shuffle_assoc($list) { 
  if (!is_array($list)) {
      return $list;
              
  }

  $keys = array_keys($list); 
  shuffle($keys); 
  $random = array(); 
  foreach ($keys as $key) { 
    $random[$key] = $list[$key]; 
  }
  return $random; 
} 

/**
 * translate temporary element to current language
 * @param type $text element of array to translate
 * @return type translated element
 */
function translate($text) {
    $ret = Yii::t('polls', $text);
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
    $answer = array_map('translate', $answer1);
    
    if ($pollsProvider->is_random) {
        $answer=shuffle_assoc($answer);
    }

    if ($pollsProvider->allow_multiple) {
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

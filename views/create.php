<?php
/* @var $this yii\web\View */
/* @var $model lslsoft\poll\PollsResult */

?>
<div class="polls-result-create">

    

    <?= $this->render('_form', [
        'model' => $model, 'pollsProvider'=>$pollsProvider
    ]) ?>

</div>

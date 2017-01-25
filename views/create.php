<?php
/* @var $this yii\web\View */
/* @var $model lslsoft\poll\PollsResult */
?>

<div class="polls-result-create">



	<?php
	$filePath = '@vendor/lslsoft/yii2-poll/views/_form';
	echo $this->render( $filePath, [
		'model' => $model, 'pollsProvider' => $pollsProvider
	] )
	?>

</div>

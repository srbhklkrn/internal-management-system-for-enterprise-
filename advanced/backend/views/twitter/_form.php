<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Twitter */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
.right {
position: absolute;
right: 10px;
width: 350px;
padding: 10px;
margin: 50;
}
td {
padding: 1px;
}
table {
border-collapse: separate;
border-spacing: 0px 0px;
}
</style>
<div class="card-panel hoverable">
	
	<?php $form = ActiveForm::begin(); ?>
	
	<div class="col s12 m6">
		<div class="card blue-grey darken-1">
			<div class="card-content white-text">
				
				<p> Center Your Embedded Tweet
					In the HTML, do a Ctrl F search for twitter-tweet to find your embedded tweet
					Find the first row of the embedded tweet, where it reads <blockquote class="twitter-tweet">
					Insert <i>tw-align-center</i> after <i>twitter-tweet</i>, and be sure to include a space after the word tweet </p>
				</div>
			</div>
		</div>
	<div class="input-field col s3"><label>Embedded Twitter Link</label></div>
	<div class="input-field col s3">
		
		<?= $form->field($model, 'twitter_link')->textarea(['rows' => 8])->label(false); ?>
	</div>
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'ADD' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
<div class="row">
	
	</div>
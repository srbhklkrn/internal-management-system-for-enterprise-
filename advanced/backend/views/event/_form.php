<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card-panel hoverable">
	<?php $form = ActiveForm::begin(); ?>
	
	<div class="input-field col s3"><label for="icon_prefix">Created Date</label></div>
	<div class="input-field col s3">
		<?= $form->field($model, 'created_on')->input('date', ['required' => true])->label(false); ?>
	</div>
	<div class="input-field col s3"><label for="icon_prefix">Title</label></div>
	<div class="input-field col s3">
		<?= $form->field($model, 'title')->textInput(['maxlength' => true,'required' => true])->label(false); ?>
	</div>
	<div class="input-field col s3"><label for="icon_prefix">Description</label></div>
	<div class="input-field col s3">
	<?= $form->field($model, 'description')->textInput(['maxlength' => true,'required' => true])->label(false); ?></div>
	
	
	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
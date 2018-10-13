<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\HotelInfo */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card-panel hoverable">
    <?php $form = ActiveForm::begin();?>
    <div class="row"><div class="input-field col s5"><label for="icon_prefix">Phone 1</label></div>
    <div class="input-field col s3">
        <?=$form->field($model, 'phone1')->textInput(['maxlength' => true])->label(false);?>
    </div>
</div>
<div class="row"><div class="input-field col s5"><label for="icon_prefix">Phone 2</label></div>
<div class="input-field col s3">
    <?=$form->field($model, 'phone2')->textInput(['maxlength' => true])->label(false);?>
</div>
</div>
<div class="row"><div class="input-field col s5"><label for="icon_prefix">Phone 3</label></div>
<div class="input-field col s3">
<?=$form->field($model, 'phone3')->textInput(['maxlength' => true])->label(false);?>
</div>
</div>
<div class="row"><div class="input-field col s5"><label for="icon_prefix">Phone 4</label></div>
<div class="input-field col s3">
<?=$form->field($model, 'phone4')->textInput(['maxlength' => true])->label(false);?>
</div>
</div>
<div class="row"><div class="input-field col s5"><label for="icon_prefix">Contact Email</label></div>
<div class="input-field col s3">
<?=$form->field($model, 'contact_email')->textInput(['maxlength' => true])->label(false);?>
</div>
</div>


<div class="row"><div class="input-field col s5"><label for="icon_prefix">Hotel Address</label></div>
<div class="input-field col s3">
<?=$form->field($model, 'hotel_address')->textarea(['rows' => 6])->label(false);?>
</div>
</div>
<div class="form-group">
<?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
</div>
<?php ActiveForm::end();?>
</div>
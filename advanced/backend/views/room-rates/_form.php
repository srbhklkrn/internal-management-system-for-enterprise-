<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomRates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-rates-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9 col-sm-6 col-xs-9">
      <div class="panel panel-primary">
        <div class="panel-heading clearfix">
          <i class="icon-calendar"></i>
          <h3 class="panel-title">Edit Rates</h3>
        </div>       
        <div class="panel-body">   
            <div class="form-group">
              <label class="col-md-2 control-label">Room Type</label>
              <div class="col-md-2">
                <?= $form->field($model, 'room_type')->label(false)->textInput(['maxlength' => true]) ?>
              </div>
              <label class="col-md-2 control-label">Default Price</label>
              <div class="col-md-2">
               <?= $form->field($model, 'default_price')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Extra Bed Charges</label>
              <div class="col-md-2">
               <?= $form->field($model, 'extra_beds_charges')->label(false)->textInput() ?>
              </div>
             <div class="form-group">
              <label class="col-md-2 control-label">Price Monday</label>
              <div class="col-md-2">
               <?= $form->field($model, 'price_monday')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Price Tuesday</label>
              <div class="col-md-2">
               <?= $form->field($model, 'price_tuesday')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Price Wednesday</label>
              <div class="col-md-2">
               <?= $form->field($model, 'price_wednesday')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Price Thursday </label>
              <div class="col-md-2">
              <?= $form->field($model, 'price_thursday')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Price Friday </label>
              <div class="col-md-2">
               <?= $form->field($model, 'price_friday')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Price Saturday </label>
              <div class="col-md-2">
              <?= $form->field($model, 'price_saturday')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Price Sunday </label>
              <div class="col-md-2">
               <?= $form->field($model, 'price_sunday')->label(false)->textInput() ?>
              </div>
              <label class="col-md-2 control-label">Tax </label>
              <div class="col-md-2">
                <?= $form->field($model, 'tax')->label(false)->textInput() ?>
              </div>
            </div>              
        </div>
      </div>
    </div>
  </div>
</div>

    

    

   

    

    

    

    

    

    

    

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

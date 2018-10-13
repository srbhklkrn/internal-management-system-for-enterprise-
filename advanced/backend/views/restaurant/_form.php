<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\form\ActiveForm;
use arogachev\excel\import\basic\Importer;
use yii\models\Restaurant;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-form">

<?php $form = ActiveForm::begin(); ?>
    <div class="container">
  <div class="row">
    <div class="col-md-9 col-sm-6 col-xs-9">
      <div class="panel panel-primary">
        <div class="panel-heading clearfix">
          <i class="icon-calendar"></i>
          <h3 class="panel-title">Restaurant Bill</h3>
        </div>       
        <div class="panel-body">   
            <div class="form-group">
              <label class="col-md-2 control-label">Booking ID</label>
              <div class="col-md-2">
                <?= $form->field($model, 'booking_id')->label(false)->textInput() ?>
              </div>

              <label class="col-md-2 control-label">Room No</label>
              <div class="col-md-2">
               <?= $form->field($model, 'room_no')->label(false)->textInput() ?>
              </div>

              <label class="col-md-2 control-label">Order Date-Time</label>
              <div class="col-md-2">
              <?= $form->field($model, 'order_date_time')->label(false)->textInput() ?>
              </div>
          </div>

             <div class="form-group">
              <label class="col-md-2 control-label">Dish Name</label>
              <div class="col-md-2">
                <?= $form->field($model, 'dish_item')->label(false)->textInput(['maxlength' => true]) ?>
              </div>
          </div>

              <div class="form-group">
              <label class="col-md-2 control-label">Dish Cost</label>
              <div class="col-md-2">
               <?= $form->field($model, 'dish_cost')->label(false)->textInput() ?>
              </div>
          </div>


              <div class="form-group">
              <label class="col-md-2 control-label">Tax</label>
              <div class="col-md-2">
                <?= $form->field($model, 'tax')->label(false)->textInput() ?>
              
              </div>
          </div>



              <div class="form-group">
              <label class="col-md-2 control-label">Total Cost </label>
              <div class="col-md-2">
              <?= $form->field($model, 'total_cost')->label(false)->textInput() ?>
              </div></div>
            </div>              
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form">
<?php 

//$form=$this->beginWidget('CActiveForm', array(
 //'id'=>'csv-form',
 //'enableAjaxValidation'=>false,
 //'htmlOptions'=>array('enctype' => 'multipart/form-data'),
 //)); 

?>

 <?php //echo $form->errorSummary($model); ?>

 
















































    

    

    

    

   

    

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

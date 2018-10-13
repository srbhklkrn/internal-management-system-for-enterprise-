<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use dosamigos\ckeditor\CKEditor;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-types-form">

     <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

   <div class="card-panel hoverable">
        
        <p class="flow-text">Create Rooms</p>
        <div class="row">
          <div class="input-field col s2"><label for="icon_prefix">Room ID:</label></div>
            <div class="input-field col s2">
             <?= $form->field($model, 'room_id')->label(false)->textInput() ?>
             </div>

             <div class="input-field col s2"><label for="icon_prefix">Room Type:</label></div>
             <div class="input-field col s2">
               <?= $form->field($model, 'room_type')->label(false)->textInput(['maxlength' => true]) ?>
             </div>

             <div class="input-field col s2"><label for="icon_prefix">Total Avilable Rooms:</label></div>
             <div class="input-field col s2">
               <?= $form->field($model, 'total_count')->label(false)->textInput(['maxlength' => true]) ?>
             </div>

             <div class="input-field col s2"><label for="icon_prefix">Room Status:</label></div>
               <div class="input-field col s2">
                <?= $form->field($model, 'status')->label(false)->dropDownList([ 'Functional' => 'Functional', 'Non-Functional' => 'Non-Functional' ], ['prompt' => '']) ?>
             </div>

             <div class="input-field col s2"><label for="icon_prefix">Adults Allowed:</label></div>
               <div class="input-field col s2">
               <?= $form->field($model, 'adults_count')->label(false)->textInput() ?>
             </div>

             <div class="input-field col s2"><label for="icon_prefix">Childs Allowed:</label></div>
               <div class="input-field col s2">
                <?= $form->field($model, 'child_count')->label(false)->textInput() ?>
             </div>
           </div>

          
           

           <div class="row">
               <div class="input-field col s2"><label for="icon_prefix">Extra Beds:</label></div>
                 <div class="input-field col s2">
                  <?= $form->field($model, 'extra_beds')->label(false)->textInput() ?>
               </div>
               

               <div class="input-field col s2"><label for="icon_prefix">Rate:</label></div>
                 <div class="input-field col s2">
                   <?= $form->field($model, 'rate')->label(false)->textInput() ?>
               </div>
            

               <div class="row"><div class="input-field col s3"><label for="icon_prefix">Description:</label></div></div><br>
                 <div class="row"><div class="input-field col s12">
                  <?= $form->field($model, 'description')->widget(CKEditor::className(), ['options' => ['rows' => 6],'preset' => 'basic'])->label(false); ?>
               </div>
           </div>



                <div class="row">
                  <div class="input-field col s3"><label for="icon_prefix">Upload Room Images:</label></div>
                </div><br>

            <div class="row">
              <div class="input-field col s12">            
                 <?php  echo $form->field($model,'imageFiles[]')->label(false)->widget(FileInput::classname(), 
                          [
                          'options'=>['accept'=>'image/*', 'multiple'=>true],
                          'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
                          ]]);  
                      ?> 
              </div>
            </div>
          </div>
     </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

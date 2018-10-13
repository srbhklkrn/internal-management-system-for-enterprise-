<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use backend\models\CreateBookings;
use kartik\select2\Select2;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\AdultPartner */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card-panel hoverable">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
        
        <p class="flow-text">Add Partner Details</p>
        
        <div class="row"><div class="input-field col s2"><label for="icon_prefix">Booking id</label></div>
        <div class="input-field col s3">
            <?= $form->field($model,'booking_id')->widget(Select2::classname(),[
            'data'=>ArrayHelper::map(CreateBookings::find()->all(),'booking_id','booking_id'),
            'language'=>'en',
            'options'=>['placeholder' => 'Select Booking ID'],
            'pluginOptions' =>[],]); ?>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s1"><label for="icon_prefix">Title</label></div>
        <div class="input-field col s2">
          <?php echo $form->field($model, 'title')->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.','Ms.' => 'Ms.', 'Miss' => 'Miss','Dr' => 'Dr.','Col.' => 'Col.','Prof.' => 'Prof.'])->label(FALSE); ?>
        </div>
        <div class="input-field col s2"><label for="icon_prefix">First Name</label></div>
        <div class="input-field col s3">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(false); ?>
        </div>

        <div class="input-field col s1"><label for="icon_prefix">Last Name</label></div>
        <div class="input-field col s3">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(false); ?>
        </div>
</div>

 <div class="row">
         <div class="input-field col s1"><label for="icon_prefix">Gender</label></div>
      <div class="input-field col s2">
        <?php echo $form->field($model, 'adult_gender')->dropDownList([0 =>'Select...','Male' => 'Male', 'Female' => 'Female',])->label(FALSE); ?>
      </div>

      <div class="input-field col s2"><label for="icon_prefix">Mobile Number</label></div>
      <div class="input-field col s3">
        <?= $form->field($model, 'adult_mobile')->input('tel', ['required' => false])->label(false); ?>
      </div>

       <div class="input-field col s1"><label for="icon_prefix">Age</label></div>
        <div class="input-field col s1">
            <?= $form->field($model, 'adult_age')->textInput(['maxlength' => true])->label(false); ?>
        </div>
</div>
<div class="row">
         <div class="input-field col s2"><label for="icon_prefix">Relation With Primary</label></div>
        <div class="input-field col s3">
            <?= $form->field($model, 'adult_relation')->textInput(['maxlength' => true])->label(false); ?>
        </div>

         <div class="input-field col s1"><label for="icon_prefix">ID Type</label></div>
      <div class="input-field col s2">
        <?php echo $form->field($model, 'adult_id_type')->dropDownList(['Passport' => 'Passport', 'Aadhar Card' => 'Aadhar Card', 'Driving Licence' => 'Driving Licence','Voter ID' => 'Voter ID'])->label(FALSE); ?>
      </div>
      
      <div class="input-field col s1"><label for="icon_prefix">ID Number</label></div>
      <div class="input-field col s3">
        <?= $form->field($model, 'adult_id_number')->textInput(['maxlength' => true])->label(false) ?>
      </div>
      </div>


      <div class="row">
      <div class="input-field col s2"><label for="icon_prefix">Upload ID Image </label></div>
      <div class="input-field col s6">
        <?php  echo $form->field($model, 'file')->label(false)->widget(FileInput::classname(),
        [
        'options'=>['accept'=>'image/*', 'multiple'=>true],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
        ]]);
        ?>
      </div></div>


      <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
</div>

    </div>






<?php ActiveForm::end(); ?>

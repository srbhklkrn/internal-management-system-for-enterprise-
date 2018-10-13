<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use kartik\widgets\TimePicker;
use kartik\datecontrol\DateControl;
use yii\widgets\MaskedInput;
use yii\behaviors\AttributeBehavior;
use yii\helpers\ArrayHelper;
use backend\models\RoomTypes;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\CreateBookings */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="create-bookings-form">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  <div class="card-panel hoverable">
    <!-- Booking  -->
    <p class="flow-text">Booking Details</p>
    <div class="row">
      <div class="input-field col s2"><label for="icon_prefix">Check-in Date</label></div>
      <div class="input-field col s3">
        <?= $form->field($model, 'check_in')->input('date', ['required' => false])->label(false); ?>
      </div>
      <div class="input-field col s3"><label for="icon_prefix">Check-out Date <i>(Optional)</i></label></div>
      <div class="input-field col s3">
        <?= $form->field($model, 'check_out')->input('date', ['required' => false])->label(false); ?>
      </div>
      <div class="input-field col s2"><label for="icon_prefix">Check-in Time</label></div>
      <div class="input-field col s3">
        <?php echo $form->field($model, 'checkin_time')->widget(TimePicker::classname(),
        ['containerOptions' => ['style' => 'position: none;']] )->label(false); ?>
      </div>
      <div class="input-field col s3"><label for="icon_prefix">Check-out Time <i>(Optional)</i></label></div>
      <div class="input-field col s3">
        <?php echo $form->field($model, 'checkout_time')->widget(TimePicker::classname(), [])->label(false); ?>
      </div>
      <div class="input-field col s2"><label for="icon_prefix">Room Type</label></div>
      <div class="input-field col s2">
        <?=$form->field($model, 'room_type')->widget(Select2::classname(), [
        'data'          => ArrayHelper::map(RoomTypes::find()->all(), 'id', 'room_type'),
        'language'      => 'en',
        'options'       => ['placeholder' => 'Select Room..', 'id' => 'zipCode'],
        'pluginOptions' => []]);?>
        <?= $form->field($model, 'room_type')->textInput(['maxlength' => true])->label(false); ?>
        <?=$form->field($model, 'rate')->textInput(['maxlength' => true, 'readonly' => true])->label(false);?>
        <?=$form->field($model, 'room_type')->textInput(['maxlength' => true, 'readonly' => true])->label(false);?>
      </div>
      <div class="input-field col s2"><label for="icon_prefix">Allotted Room</label></div>
      <div class="input-field col s1"><?= $form->field($model, 'room_number')->textInput(['maxlength' => true])->label(false); ?>
      </div>
      
      <div class="input-field col s1"><label for="icon_prefix">Status</label></div>
      <div class="input-field col s2"><?php echo $form->field($model, 'booking_status')->dropDownList(['CHECK IN' => 'CHECK IN', 'CHECK OUT' => 'CHECK OUT','CANCEL'=>'CANCEL','PROVISIONAL'=>'PROVISIONAL'])->label(FALSE); ?>
      </div>
    </div>
    </div> <!-- End Of Booking -->
    <div class="card-panel hoverable">
      <p class="flow-text">Guest Details</p>
      <div class="row col s12">
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
        <div class="input-field col s1"><label for="icon_prefix">Gender</label></div>
        <div class="input-field col s2">
          <?php echo $form->field($model, 'gender_1')->dropDownList([0 =>'Select...','Male' => 'Male', 'Female' => 'Female',])->label(FALSE); ?>
        </div>
        <div class="input-field col s2"><label for="icon_prefix">Mobile Number</label></div>
        <div class="input-field col s2">
          <?= $form->field($model, 'primary_mobile')->input('tel', ['required' => false])->label(false); ?>
        </div>
        <div class="input-field col s2"><label for="icon_prefix">Email Id <i>(Optional)</i></label></div>
        <div class="input-field col s3">
          <?= $form->field($model, 'primary_email')->input('email', ['required' => false])->label(false); ?>
        </div>
        <div class="input-field col s1"><label for="icon_prefix">ID Type</label></div>
        <div class="input-field col s2">
          <?php echo $form->field($model, 'id_type')->dropDownList(['Passport' => 'Passport', 'Aadhar Card' => 'Aadhar Card', 'Driving Licence' => 'Driving Licence','Voter ID' => 'Voter ID'])->label(FALSE); ?>
        </div>
        
        <div class="input-field col s2"><label for="icon_prefix">ID Number</label></div>
        <div class="input-field col s2">
          <?= $form->field($model, 'id_number')->textInput(['maxlength' => true])->label(false) ?>
        </div>
        <div class="input-field col s2"><label for="icon_prefix">DOB</label></div>
        <div class="input-field col s3">
          <?= $form->field($model, 'dob')->label(false)->input('date', ['placeholder' => '']) ?>
        </div>
        
        <div class="input-field col s2"><label for="icon_prefix">Upload ID Image </label></div>
        <div class="input-field col s4">
          <?php  echo $form->field($model, 'file')->label(false)->widget(FileInput::classname(),
          [
          'options'=>['accept'=>'image/*', 'multiple'=>true],
          'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
          ]]);
          ?>
        </div>
        <div class="input-field col s2"><label for="icon_prefix">Address</label></div>
        <div class="input-field col s3">
          <?= $form->field($model, 'primary_address')->textarea(['rows' => 6])->label(false); ?>
        </div>
      </div>
      <div class="row col s12">
        <div class="input-field col s2"><label for="icon_prefix">Zip/Pin Code</label></div>
        <div class="input-field col s2">
          <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true])->label(false); ?>
        </div>
        <div class="input-field col s1"><label for="icon_prefix">City</label></div>
        <div class="input-field col s3">
          <?= $form->field($model, 'city')->textInput(['maxlength' => true])->label(false); ?>
        </div>
        <div class="input-field col s1"><label for="icon_prefix">Country</label></div>
        <div class="input-field col s3">
          <?= $form->field($model, 'country')->textInput(['maxlength' => true])->label(false); ?>
        </div></div>
      </div>
      <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
      <?php ActiveForm::end(); ?>
    </div>



<?php
$script = <<< JS
$('#zipCode').change(function()
{
var zipId = $(this).val();
$.get('index.php?r=bookings/get-city-province',{ zipId : zipId }, function(data)
{
var data = $.parseJSON(data);
$('#bookings-rate').attr('value',data.rate);
$('#bookings-room_type').attr('value',data.room_type);
alert(data.rate);
});
});
JS;
$this->registerJs($script);
?>
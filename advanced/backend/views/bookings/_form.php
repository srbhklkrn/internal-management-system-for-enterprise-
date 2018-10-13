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
use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\CreateBookings */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$temp = new \yii\base\DynamicModel(['total_remain']);
$temp->addRule(['total_remain'], 'safe');
?>
<?php
$todo  = (new yii\db\Query())
->select(['room_type','total_booked','total_remain','total_count'])
->from('room_types')
->all();
?>
<style>
.right {
position: relative;
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
<div class="create-bookings-form">
  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  <div class="row">
    <div class="col s8">
      <div class="card-panel hoverable">
        <!-- Booking  -->
        <p class="flow-text">Booking Details</p>
        <div class="row">
          <div class="input-field col s3"><label for="icon_prefix">Check-in Date</label></div>
          <div class="input-field col s3">
            <?= $form->field($model, 'check_in')->input('date', ['required' => true])->label(false); ?>
          </div>
          <div class="input-field col s3"><label for="icon_prefix">Check-out Date <i>(Optional)</i></label></div>
          <div class="input-field col s3">
            <?= $form->field($model, 'check_out')->input('date', ['required' => false])->label(false); ?>
          </div>
          <div class="input-field col s3"><label for="icon_prefix">Check-in Time</label></div>
          <div class="input-field col s3">
            
            <?= $form->field($model, 'checkin_time')->widget(DateTimePicker::className(), [
            'language' => 'en',
            'size' => 'ms',
            'template' => '{input}',
            'pickButtonIcon' => 'glyphicon glyphicon-time',
            'inline' => false,
            'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            //'linkFormat' => 'HH:ii P', // if inline = true
            'format' => 'HH:ii P', // if inline = false
            'todayBtn' => true
            ]
            ])->label(false);?>
          </div>
          <div class="input-field col s3"><label for="icon_prefix">Check-out Time <i>(Optional)</i></label></div>
          <div class="input-field col s3">
            <?= $form->field($model, 'checkout_time')->widget(DateTimePicker::className(), [
            'language' => 'en',
            'size' => 'ms',
            'template' => '{input}',
            'pickButtonIcon' => 'glyphicon glyphicon-time',
            'inline' =>false,
            'clientOptions' => [
            'startView' => 1,
            'minView' => 0,
            'maxView' => 1,
            'autoclose' => true,
            //'linkFormat' => 'HH:ii P', // if inline = true
            'format' => 'HH:ii P', // if inline = false
            'todayBtn' => true
            ]
            ])->label(false);?>
            
          </div>
          <div class="input-field col s3"><label for="icon_prefix">Room Type</label></div>
          <div class="input-field col s3">
            <?=$form->field($model, 'room_type')->widget(Select2::classname(), [
            'data'          => ArrayHelper::map(RoomTypes::find()->all(), 'id', 'room_type'),
            'language'      => 'en',
            'options'       => ['placeholder' => 'Select Room..', 'id' => 'zipCode'],
            'pluginOptions' => []]);?>
            <?=$form->field($model, 'room_type')->hiddenInput()->label(false);?>
            <?=$form->field($model, 'rate')->hiddenInput()->label(false);?>
          </div>
          
          
          <div class="input-field col s3"><label for="icon_prefix">Allotted Room</label></div>
          <div class="input-field col s3"><?= $form->field($model, 'room_number')->textInput(['maxlength' => true,'required' => true])->label(false); ?>
          </div>
          
          <div class="input-field col s3"><label for="icon_prefix">Status</label></div>
          <div class="input-field col s3"><?php echo $form->field($model, 'booking_status')->dropDownList(['CHECK IN' => 'CHECK IN', 'CHECK OUT' => 'CHECK OUT','CANCEL'=>'CANCEL','PROVISIONAL'=>'PROVISIONAL'])->label(FALSE); ?>
          </div>
        </div>
        </div> <!-- End Of Booking -->
      </div>
      
      
      <!-- Room Inventory Card -->
      <div class="col s4">
        <div>
          <div class="card teal lighten-2">
            <div class="card-content black-text">
              <span class="card-title">Room Inventory </span>
              <table class="centered responsive-table highlight">
                <thead class="card-panel hoverable">
                  <th>#</th>
                  <th>Room Type</th>
                  <th>Total Available</th>
                  <th>Total Booked</th>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($todo as $row) {
                  ?>
                  
                  <tr class="card-panel lime">
                    <td><?php echo $i;?></td>>
                    <td><?php echo $row['room_type']; ?></td>
                    <td><?php echo $row['total_remain']; ?></td>
                    <td><?php echo $row['total_booked']; ?></td>
                  </tr>
                  
                  
                  
                  <?php
                  $i++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
         <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo Yii::$app->session->getFlash('success') ?>
                    </div>
                    <?php endif; ?>
      </div>
      
     
                   
                  
                    
       </div>
     
  
    <!-- Room Inventory End -->
    <div class="row">
      <div class="col s12">
        <div class="card-panel hoverable">
          <p class="flow-text">Guest Details</p>
          <div class="row col s12">
            <div class="input-field col s1"><label for="icon_prefix">Title</label></div>
            <div class="input-field col s2">
              <?php echo $form->field($model, 'title')->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.','Ms.' => 'Ms.', 'Miss' => 'Miss','Dr' => 'Dr.','Col.' => 'Col.','Prof.' => 'Prof.'])->label(FALSE); ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">First Name</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'first_name')->textInput(['maxlength' => true,'required' => true])->label(false); ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Last Name</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'last_name')->textInput(['maxlength' => true,'required' => true])->label(false); ?>
            </div>
          </div>
          <div class="row col s12">
            <div class="input-field col s1"><label for="icon_prefix">Gender</label></div>
            <div class="input-field col s2">
              <?php echo $form->field($model, 'gender_1')->dropDownList([0 =>'Select...','Male' => 'Male', 'Female' => 'Female',])->label(FALSE); ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Mobile Number</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'primary_mobile')->input('tel', ['required' => true,'integerOnly'=>true])->label(false); ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Email</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'primary_email')->input('email', ['required' => true])->label(false); ?>
            </div>
          </div>
          <div class="row col s12">
            <div class="input-field col s1"><label for="icon_prefix">ID Type</label></div>
            <div class="input-field col s2">
              <?php echo $form->field($model, 'id_type')->dropDownList(['Passport' => 'Passport', 'Aadhar Card' => 'Aadhar Card', 'Driving Licence' => 'Driving Licence','Voter ID' => 'Voter ID'])->label(FALSE); ?>
            </div>
            
            <div class="input-field col s2"><label for="icon_prefix">ID Number</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'id_number')->textInput(['maxlength' => true,'required' => true])->label(false) ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">DOB</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'dob')->label(false)->input('date', ['required' => true]) ?>
            </div>
          </div>
          <div class="row col s12">
            <div class="input-field col s2"><label for="icon_prefix">Address</label></div>
            <div class="input-field col s5">
              <?= $form->field($model, 'primary_address')->textarea(['rows' => 8,'required' => true])->label(false); ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">ZIP/Pin Code</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true,'required' => true])->label(false); ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">City</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'city')->textInput(['maxlength' => true,'required' => true])->label(false); ?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Country</label></div>
            <div class="input-field col s2">
              <?= $form->field($model, 'country')->textInput(['maxlength' => true,'required' => true])->label(false); ?>
            </div>
          </div>
          
          <div class="row">
            <div class="input-field col s2"><label for="icon_prefix">Upload ID Image </label></div>
            <div class="input-field col s10">
              <?php  echo $form->field($model, 'file')->label(false)->widget(FileInput::classname(),
              [
              'options'=>['accept'=>'image/*', 'multiple'=>true,'required' => true],
              'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
              ]]);
              ?>
            </div>
          </div>
          <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
          </div>
          <?php ActiveForm::end(); ?>
        </div></div>



<?php
$script = <<< JS
$('#zipCode').change(function()
{
var zipId = $(this).val();
$.get('index.php?r=bookings/get-city',{ zipId : zipId }, function(data)
{
var data = $.parseJSON(data);
$('#bookings-rate').attr('value',data.rate);
$('#bookings-room_type').attr('value',data.room_type);
$('#bookings-total_remain').attr('value',data.total_remain);
});
});
JS;
$this->registerJs($script);
?>
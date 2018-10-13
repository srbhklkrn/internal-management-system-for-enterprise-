<?php
use backend\models\Bookings;
use backend\models\Tax;
use kartik\select2\Select2;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Invoices */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$query = new Query;
$todo  = (new yii\db\Query())
    ->select(['id', 'service_charge', 'service_tax', 'luxury_tax', 'swach_bharat_cess'])
    ->from('tax')
    ->all();
?>
<?php
$temp = new \yii\base\DynamicModel(['tax_category']);
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
<div class="invoices-form">
    <div class="card-panel hoverable">
        <p class="flow-text">Guest Details</p>
        <div class="row col s12">
            <?php $form = ActiveForm::begin();?>
            <div class="input-field col s6"><label for="icon_prefix">Booking ID</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'booking_id')->widget(Select2::classname(), [
    'data'          => ArrayHelper::map(Bookings::find()->where(['booking_status' => "CHECK OUT"])->all(), 'id', 'booking_id'),
    'language'      => 'en',
    'options'       => ['placeholder' => 'Select Booking ID', 'id' => 'zipCode'],
    'pluginOptions' => []]);?>
                <?=$form->field($model, 'booking_id')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'check_in')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'check_out')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'primary_address')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'city')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'country')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'zip_code')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'room_type')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'rate')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'primary_email')->hiddenInput()->label(false);?>
                <?=$form->field($model, 'primary_mobile')->hiddenInput()->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">First Name</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'first_name')->textInput(['maxlength' => true, 'readonly' => true])->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">Last Name</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'last_name')->textInput(['maxlength' => true, 'readonly' => true])->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">Stay Charges (Excluding Tax's)</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'stay_charges')->textInput(['maxlength' => true, 'readonly' => true])->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">Allotted Room</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'room_number')->textInput(['maxlength' => true, 'readonly' => true])->label(false);?>
            </div>
        </div>
    </div>
    <div class="card-panel hoverable">
        <p class="flow-text">Tax Details</p>
        <!-- Tax Categories Card -->
        <div class="right">
            <div>
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <span class="card-title">Available Tax Categories</span>
                        <table class="centered responsive-table highlight">
                            <thead class="card-panel hoverable">
                                <th>#</th>
                                <th>Tax Name</th>
                                <th>%</th>
                            </thead>
                            <tbody>
                                <?php
$i = 1;
foreach ($todo as $row) {
    ?>
                                <tr class="card-panel light-blue">
                                    <td rowspan="5">Cat <?php echo $i; ?></td>
                                </tr>
                                <tr class="card-panel lime">
                                    <td>Service Charges</td>
                                    <td><?php echo $row['service_charge']; ?></td>
                                </tr>
                                <tr class="card-panel lime">
                                    <td>Luxury Tax</td>
                                    <td><?php echo $row['luxury_tax']; ?></td>
                                </tr>
                                <tr class="card-panel lime">
                                    <td>Swach Bharat Cess</td>
                                    <td><?php echo $row['swach_bharat_cess']; ?></td>
                                </tr>
                                <tr class="card-panel lime">
                                    <td>Service Tax</td>
                                    <td><?php echo $row['service_tax']; ?></td>
                                </tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <?php
$i++;
}
?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div> <!-- Tax Card End -->
            <div class="row col s12 s5">
                <div class="input-field col s5"><label for="icon_prefix">Tax Categories</label></div>
                <div class="input-field col s3">
                    <?=$form->field($temp, 'tax_category')->widget(Select2::classname(), [
    'data'          => ArrayHelper::map(Tax::find()->all(), 'id', 'tax_category'),
    'language'      => 'en',
    'options'       => ['placeholder' => 'Select Tax', 'id' => 'empCode'],
    'pluginOptions' => [
    ],
]);?>
                </div>
                <div class="input-field col s5"><label for="icon_prefix">Service Charges</label></div>
                <div class="input-field col s3">
                    <?=$form->field($model, 'service_charge')->textInput()->label(false);?>
                </div>
                <div class="input-field col s5"><label for="icon_prefix">Service Tax</label></div>
                <div class="input-field col s3">
                    <?=$form->field($model, 'service_tax')->textInput()->label(false);?>
                </div>
                <div class="input-field col s5"><label for="icon_prefix">Luxury Tax</label></div>
                <div class="input-field col s3">
                    <?=$form->field($model, 'luxury_tax')->textInput()->label(false);?>
                </div>
                <div class="input-field col s5"><label for="icon_prefix">Swach Bharat Cess</label></div>
                <div class="input-field col s3">
                    <?=$form->field($model, 'swach_bharat_cess')->textInput()->label(false);?>
                </div>
                <div class="input-field col s5"><label for="icon_prefix">Discount - (On Stay Charges)</label></div>
                <div class="input-field col s3">
                    <?=$form->field($model, 'discount')->textInput()->label(false);?>
                </div>
                <div class="input-field col s5"><label for="icon_prefix">Mode Of Payment</label></div>
                <div class="input-field col s3">
                    <?=$form->field($model, 'payment')->dropDownList(['Credit Card' => 'Credit Card', 'Debit Card' => 'Debit Card', 'Online' => 'Online', 'Cash' => 'Cash'], ['prompt' => 'Paid By..'])->label(false);?>
                </div>
            </div>
            <div class="form-group">
            <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
        </div>
        </div>
        
    </div>
</div>
<?php ActiveForm::end();?>
</div>
</div>
<?php
$script = <<< JS
$('#zipCode').change(function()
{
var zipId = $(this).val();
$.get('index.php?r=invoices/get-city-province',{ zipId : zipId }, function(data)
{
var data = $.parseJSON(data);
$('#invoices-booking_id').attr('value',data.booking_id);
$('#invoices-first_name').attr('value',data.first_name);
$('#invoices-last_name').attr('value',data.last_name);
$('#invoices-stay_charges').attr('value',data.stay_charges);
$('#invoices-room_number').attr('value',data.room_number);
$('#invoices-check_in').attr('value',data.check_in);
$('#invoices-check_out').attr('value',data.check_out);
$('#invoices-primary_address').attr('value',data.primary_address);
$('#invoices-city').attr('value',data.city);
$('#invoices-country').attr('value',data.country);
$('#invoices-zip_code').attr('value',data.zip_code);
$('#invoices-room_type').attr('value',data.room_type);
$('#invoices-rate').attr('value',data.rate);
$('#invoices-primary_email').attr('value',data.primary_email);
$('#invoices-primary_mobile').attr('value',data.primary_mobile);
});
});
JS;
$this->registerJs($script);
?>
<?php
$script = <<< JS
$('#empCode').change(function(){
var empId = $(this).val();
$.get('index.php?r=invoices/get-client-email',{ empId : empId }, function(data)
{
var data = $.parseJSON(data);
$('#invoices-service_charge').attr('value',data.service_charge);
$('#invoices-service_tax').attr('value',data.service_tax);
$('#invoices-luxury_tax').attr('value',data.luxury_tax);
$('#invoices-swach_bharat_cess').attr('value',data.swach_bharat_cess);
});
});
JS;
$this->registerJs($script);
?>
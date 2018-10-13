<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use kartik\daterange\DateRangePicker;
use kartik\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'Reports';
?>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
<div class="card-panel hoverable">

<H5> Select Date Range To Generate Booking Reports</H5>
	<?php
		echo $form->field($model, 'date_range', [
	'addon'=>['prepend'=>['content'=>'<i class="glyphicon glyphicon-calendar"></i>']],
	'options'=>['class'=>'drp-container form-group']
	])->widget(DateRangePicker::classname(), [
	'useWithAddon'=>true
	]);
	?>
</div>
<?php ActiveForm::end(); ?>
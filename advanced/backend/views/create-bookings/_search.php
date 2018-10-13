<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CreateBookingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="create-bookings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'booking_id') ?>

    <?= $form->field($model, 'check_in') ?>

    <?= $form->field($model, 'checkin_time') ?>

    <?= $form->field($model, 'check_out') ?>

    <?php // echo $form->field($model, 'room_type') ?>

    <?php // echo $form->field($model, 'stay_charges') ?>

    <?php // echo $form->field($model, 'primary_name') ?>

    <?php // echo $form->field($model, 'gender_1') ?>

    <?php // echo $form->field($model, 'primary_mobile') ?>

    <?php // echo $form->field($model, 'primary_email') ?>

    <?php // echo $form->field($model, 'id_type') ?>

    <?php // echo $form->field($model, 'id_number') ?>

    <?php // echo $form->field($model, 'id_image') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'primary_address') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'country') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

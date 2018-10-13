<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\InvoicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoices-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'invoice_no') ?>

    <?= $form->field($model, 'booking_id') ?>

    <?= $form->field($model, 'client_name') ?>

    <?= $form->field($model, 'stay_charges') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'service_charge') ?>

    <?php // echo $form->field($model, 'service_tax') ?>

    <?php // echo $form->field($model, 'luxury_tax') ?>

    <?php // echo $form->field($model, 'swach_bharat_cess') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <?php // echo $form->field($model, 'payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

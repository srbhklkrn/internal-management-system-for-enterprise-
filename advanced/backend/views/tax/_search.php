<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TaxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'service_charge') ?>

    <?= $form->field($model, 'service_tax') ?>

    <?= $form->field($model, 'luxury_tax') ?>

    <?php // echo $form->field($model, 'swach_bharat_cess') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

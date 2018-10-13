<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdultPartnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adult-partner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'booking_id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'adult_gender') ?>

    <?= $form->field($model, 'adult_mobile') ?>

    <?php // echo $form->field($model, 'adult_age') ?>

    <?php // echo $form->field($model, 'adult_relation') ?>

    <?php // echo $form->field($model, 'adult_id_image') ?>

    <?php // echo $form->field($model, 'adult_id_type') ?>

    <?php // echo $form->field($model, 'adult_id_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

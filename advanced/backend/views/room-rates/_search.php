<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomRatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-rates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'room_type') ?>

    <?= $form->field($model, 'default_price') ?>

    <?= $form->field($model, 'extra_beds_charges') ?>

    <?= $form->field($model, 'price_monday') ?>

    <?php // echo $form->field($model, 'price_tuesday') ?>

    <?php // echo $form->field($model, 'price_wednesday') ?>

    <?php // echo $form->field($model, 'price_thursday') ?>

    <?php // echo $form->field($model, 'price_friday') ?>

    <?php // echo $form->field($model, 'price_saturday') ?>

    <?php // echo $form->field($model, 'price_sunday') ?>

    <?php // echo $form->field($model, 'tax') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

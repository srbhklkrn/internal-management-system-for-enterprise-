<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RestaurantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'booking_id') ?>

    <?= $form->field($model, 'room_no') ?>

    <?= $form->field($model, 'order_date_time') ?>

    <?= $form->field($model, 'dish_item') ?>

    <?php // echo $form->field($model, 'dish_cost') ?>

    <?php // echo $form->field($model, 'total_cost') ?>

    <?php // echo $form->field($model, 'tax') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

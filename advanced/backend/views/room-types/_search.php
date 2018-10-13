<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomTypesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="room-types-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'room_id') ?>

    <?= $form->field($model, 'room_type') ?>

    <?= $form->field($model, 'total_count') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'extra_beds') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'adults_count') ?>

    <?php // echo $form->field($model, 'child_count') ?>

    <?php // echo $form->field($model, 'total_people') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

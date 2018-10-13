<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KidPartnerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kid-partner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'booking_id') ?>

    <?= $form->field($model, 'kid_name') ?>

    <?= $form->field($model, 'k_gender') ?>

    <?= $form->field($model, 'k_age') ?>

    <?php // echo $form->field($model, 'k_relation') ?>

    <?php // echo $form->field($model, 'k_id_image') ?>

    <?php // echo $form->field($model, 'k_id_type') ?>

    <?php // echo $form->field($model, 'k_id_number') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

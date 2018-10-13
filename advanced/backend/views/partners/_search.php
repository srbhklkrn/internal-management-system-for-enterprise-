<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PartnersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partners-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'create_bookings_id') ?>

    <?= $form->field($model, 'adult_name') ?>

    <?= $form->field($model, 'adult_gender') ?>

    <?= $form->field($model, 'adult_mobile') ?>

    <?php // echo $form->field($model, 'adult_age') ?>

    <?php // echo $form->field($model, 'adult_relation') ?>

    <?php // echo $form->field($model, 'adult_id_image') ?>

    <?php // echo $form->field($model, 'adult_id_type') ?>

    <?php // echo $form->field($model, 'adult_id_number') ?>

    <?php // echo $form->field($model, 'k_name') ?>

    <?php // echo $form->field($model, 'k_gender') ?>

    <?php // echo $form->field($model, 'k_age') ?>

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

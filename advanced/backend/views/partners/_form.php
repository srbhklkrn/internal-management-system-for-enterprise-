<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Partners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_bookings_id')->textInput() ?>

    <?= $form->field($model, 'adult_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adult_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adult_mobile')->textInput() ?>

    <?= $form->field($model, 'adult_age')->textInput() ?>

    <?= $form->field($model, 'adult_relation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adult_id_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adult_id_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adult_id_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_age')->textInput() ?>

    <?= $form->field($model, 'k_relation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_id_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_id_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'k_id_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

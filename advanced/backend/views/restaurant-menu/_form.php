<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RestaurantMenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-menu-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data'] ]); ?>

    <?= $form->field($model, 'menu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

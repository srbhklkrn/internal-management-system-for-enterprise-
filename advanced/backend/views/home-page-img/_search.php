<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HomePageImgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="home-page-img-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'photo_1') ?>

    <?= $form->field($model, 'photo_1_text') ?>

    <?= $form->field($model, 'photo_1_subtext') ?>

    <?= $form->field($model, 'photo_2') ?>

    <?php // echo $form->field($model, 'photo_2_text') ?>

    <?php // echo $form->field($model, 'photo_2_subtext') ?>

    <?php // echo $form->field($model, 'photo_3') ?>

    <?php // echo $form->field($model, 'photo_3_text') ?>

    <?php // echo $form->field($model, 'photo_3_subtext') ?>

    <?php // echo $form->field($model, 'photo_4') ?>

    <?php // echo $form->field($model, 'photo_4_text') ?>

    <?php // echo $form->field($model, 'photo_4_subtext') ?>

    <?php // echo $form->field($model, 'img_1_name') ?>

    <?php // echo $form->field($model, 'img_2_name') ?>

    <?php // echo $form->field($model, 'img_3_name') ?>

    <?php // echo $form->field($model, 'img_4_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

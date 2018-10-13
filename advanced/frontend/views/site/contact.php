<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
?>
<!-- Write Us -->
<div class="col-md-6 bordered_block image_bck bordered_wht_border white_txt" data-image="images/hotel_c2.jpg">
    <div class="over" data-opacity="0.6" data-color="#292929"></div>
    <div class="col-md-12 simple_block text-left">
        <h3>Write Us</h3>
        <form id="write_us" class="form">
            <?php $form = ActiveForm::begin(['id'=>'write_us','class'=>'form']); ?>
            <div class="row">
                <div class="col-md-6">
                    <!-- <input type="text" id="name" class="form-control form-opacity" placeholder="Name*"> -->
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <input type="text" id="surname" class="form-control form-opacity" placeholder="Surname*">
                </div>
                <div class="col-md-6">
                    <input type="text" id="city" class="form-control form-opacity" placeholder="City">
                </div>
                <div class="col-md-6">
                    <input type="text" id="country" class="form-control form-opacity" placeholder="Country">
                </div>
                <div class="col-md-6">
                    <input type="text" id="email" class="form-control form-opacity" placeholder="E-mail*">
                </div>
                <div class="col-md-6">
                    <input type="text" id="phone" class="form-control form-opacity" placeholder="Phone">
                </div>
                <div class="col-md-12">
                    <textarea placeholder="Message" id="message" class="form-control form-opacity"></textarea>
                </div>
                <div class="col-md-12">
                    <input type="submit" class="btn btn-white submit" value="Send">
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <!-- Write Us End -->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\Tax */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tax-form">
    <div class="card-panel hoverable">
        <p class="flow-text">Tax Manager</p>
        <div class="row col s12">
            <?php $form = ActiveForm::begin();?>
            <div class="input-field col s6"><label for="icon_prefix">Tax Category</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'tax_category')->textInput()->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">Service Charge (%)</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'service_charge')->textInput()->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">Service Tax (%)</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'service_tax')->textInput()->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">Luxury Tax (%)</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'luxury_tax')->textInput()->label(false);?>
            </div>
            <div class="input-field col s6"><label for="icon_prefix">Swach Bharat Cess (%)</label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'swach_bharat_cess')->textInput()->label(false);?>
            </div>
        </div>
        <div class="form-group">
            <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
        </div>
        <?php ActiveForm::end();?>
    </div>
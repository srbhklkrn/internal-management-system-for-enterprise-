<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\HomePageImg */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="home-page-img-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

    <!-- Image 1 -->
    <div class="card-panel hoverable">
        <p class="flow-text">Image 1 Details</p>
        <div class="row col s12">
            <div class="input-field col s2"><label for="icon_prefix">Name </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'img_1_name')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Description </label></div>
            <div class="input-field col s4">
                <?=$form->field($model, 'photo_1_text')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Subtext </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'photo_1_subtext')->textInput(['maxlength' => true])->label(false);?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2"><label for="icon_prefix">Upload Image </label></div>
            <div class="input-field col s10">
                <?php  echo $form->field($model, 'file1')->label(false)->widget(FileInput::classname(),
                [
                'options'=>['accept'=>'image/*', 'multiple'=>true],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
                ]]);
                ?>
            </div>
        </div>
    </div>
<!-- Image 1 End -->
<!-- Image 2 -->
    <div class="card-panel hoverable">
        <p class="flow-text">Image 2 Details</p>
        <div class="row col s12">
            <div class="input-field col s2"><label for="icon_prefix">Name </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'img_2_name')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Description </label></div>
            <div class="input-field col s4">
                <?=$form->field($model, 'photo_2_text')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Subtext </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'photo_2_subtext')->textInput(['maxlength' => true])->label(false);?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2"><label for="icon_prefix">Upload Image </label></div>
            <div class="input-field col s10">
                <?php  echo $form->field($model, 'file2')->label(false)->widget(FileInput::classname(),
                [
                'options'=>['accept'=>'image/*', 'multiple'=>true],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
                ]]);
                ?>
            </div>
        </div>
    </div>
<!-- Image 2 End -->
<!-- Image 3 -->
    <div class="card-panel hoverable">
        <p class="flow-text">Image 3 Details</p>
        <div class="row col s12">
            <div class="input-field col s2"><label for="icon_prefix">Name </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'img_3_name')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Description </label></div>
            <div class="input-field col s4">
                <?=$form->field($model, 'photo_3_text')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Subtext </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'photo_3_subtext')->textInput(['maxlength' => true])->label(false);?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2"><label for="icon_prefix">Upload Image </label></div>
            <div class="input-field col s10">
                <?php  echo $form->field($model, 'file3')->label(false)->widget(FileInput::classname(),
                [
                'options'=>['accept'=>'image/*', 'multiple'=>true],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
                ]]);
                ?>
            </div>
        </div>
    </div>
<!-- Image 3 End -->
<!-- Image 4 -->
    <div class="card-panel hoverable">
        <p class="flow-text">Image 4 Details</p>
        <div class="row col s12">
            <div class="input-field col s2"><label for="icon_prefix">Name </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'img_4_name')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Description </label></div>
            <div class="input-field col s4">
                <?=$form->field($model, 'photo_4_text')->textInput(['maxlength' => true])->label(false);?>
            </div>
            <div class="input-field col s2"><label for="icon_prefix">Subtext </label></div>
            <div class="input-field col s3">
                <?=$form->field($model, 'photo_4_subtext')->textInput(['maxlength' => true])->label(false);?>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2"><label for="icon_prefix">Upload Image </label></div>
            <div class="input-field col s10">
                <?php  echo $form->field($model, 'file4')->label(false)->widget(FileInput::classname(),
                [
                'options'=>['accept'=>'image/*', 'multiple'=>true],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']
                ]]);
                ?>
            </div>
        </div>
    </div>
<!-- Image 4 End -->
<div class="form-group">
    <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
</div>
<?php ActiveForm::end();?>
</div>
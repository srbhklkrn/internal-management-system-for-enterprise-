<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use backend\models\HotelInfo;
use backend\models\HotelInfoSearch;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
$this->title = 'Contact Us';
?>
<?php $data = HotelInfo::find()->where(['id' => 1])->one(); ?>
<style>
.right {
position: absolute;
right: 10px;
width: 350px;
padding: 20px;
margin: 50;
}
</style>
<?php if (Yii::$app->session->hasFlash('success')): ?>
<?php echo Yii::$app->session->getFlash('success') ?>
<?php endif; ?>
<?php //$model = new ContactUs(); ?>
<!-- Inside Title -->
<div class="inside_title image_bck bordered_wht_border white_txt" data-image="images/city.jpg ">
    <!-- Over -->
    <div class="over" data-opacity="0.2" data-color="#000"></div>
    <div class="container">
        
        <div class="row">
            <div class="col-md-6"><h1>Contact Us</h1></div>
            <div class="col-md-6 text-right"><div class="breadcrumbs"><a href="<?= Url::to(['site/index']);?>">Home</a>Contact Us</div></div>
            
        </div>
    </div>
</div>
<!-- Inside Title End -->
<!-- Welcome -->
<section class="boxes" id="welcome">
    <div class="container-fluid">
        <div class="row">
            <!-- col -->
            <div class="col-md-12 bordered_block grey_border">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Welcome to Berg</h2>
                            <h4 class="subtitle">
                            If you have any inquiries about Berg Hotels, please contact us anytime. Our team at Berge Hotels will be most happy to assist you.
                            </h4>
                            <h4 class="subtitle"> <i>***For Cancelation Of Bookings Please Fill Below Contact form with your boking ID, we will get back to you soon!</i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Col End -->
        </div>
        <!-- Welcome Image -->
        <div class="intro_image intro_text_rb text-center z0 wow fadeInUp" data-wow-duration="2s">
            <img src="images/girl3.png" alt="">
        </div>
    </div>
</section>
<!-- Welcome End -->
<!-- Contacts -->
<section class="boxes" id="contacts">
    <div class="container-fluid">
        <div class="row">
            <!-- Contacts -->
            <div class="col-md-6 bordered_block image_bck bordered_wht_border white_txt " data-image="images/furn3.jpg">
                <div class="over" data-opacity="0.02" data-color="#121d2a"></div>
                <div class="col-md-12 simple_block text-left">
                    <h3>Contacts</h3>
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone1); ?><br />
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone2); ?><br />
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone3); ?><br />
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone4); ?><br />
                    <span class="contacts_ti ti-email"></span><a href="mailto:<?php echo Html::encode($data->contact_email); ?>"><?php echo Html::encode($data->contact_email); ?></a><br />
                    <span class="contacts_ti ti-location-pin"></span><?php echo Html::encode($data->hotel_address); ?>
                </div>
            </div>
            <!-- Write Us -->
            <div class="col-md-6 bordered_block image_bck bordered_wht_border white_txt" data-image="images/hotel_c2.jpg">
                <div class="over" data-opacity="0.6" data-color="#292929"></div>
                <div class="col-md-12 simple_block text-left">
                    <h3>Write Us</h3>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','id'=>'write_us','class'=>'form']]); ?>
                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo Yii::$app->session->getFlash('success') ?>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label>First Name (*)</label>
                            <?=$form->field($model, 'first_name')->textInput(['maxlength' => true,'required' => true])->label(false)?>
                        </div>
                        <div class="col-md-6">
                            <label>Last Name (*)</label>
                            <?=$form->field($model, 'last_name')->textInput(['maxlength' => true,'required' => true])->label(false)?>
                        </div>
                        <div class="col-md-6">
                            <label>City</label>
                            <?=$form->field($model, 'city')->textInput(['maxlength' => true])->label(false)?>
                        </div>
                        <div class="col-md-6">
                            <label>Country</label>
                            <?=$form->field($model, 'country')->textInput(['maxlength' => true])->label(false)?>
                        </div>
                        <div class="col-md-6">
                            <label>Email (*)</label>
                            <?=$form->field($model, 'email', ['options' => []])->input('email', ['required' => true, 'placeholder' => ''])->label(false);?>
                        </div>
                        <div class="col-md-6">
                            <label>Phone (*)</label>
                            
                            <?=$form->field($model, 'phone', ['options' => []])->input('tel', ['required' => true, 'placeholder' => ''])->label(false);?>
                        </div>
                        <div class="col-md-12">
                            <label>Message (*)</label>
                            <?=$form->field($model, 'message')->textarea(['rows' => 6,'required' => true])->label(false)?>
                        </div>
                        <div class="col-md-12">
                            <?=Html::submitButton('Submit', ['class' => 'btn btn-success']);?>
                        </div>
                    </div>
                    <?php ActiveForm::end();?>
                </div>
            </div>
            <!-- Write Us End -->
            
        </div>
        <!-- Row End -->
    </div>
</section>
<!-- Contacts End -->
<!-- Map -->
<section class="boxes">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bordered_block col-xs-12 iframe_full height400">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.928904454515!2d72.81479189242422!3d19.022854242742223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x526dd9446adfb620!2sWorli+Fort!5e0!3m2!1sen!2sin!4v1460885266928" width="600" height="450" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
    </div>
</section>
<!-- Map End -->
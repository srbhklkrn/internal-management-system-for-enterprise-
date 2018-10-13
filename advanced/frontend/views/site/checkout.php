<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
$this->title = 'Check Out';

?>
<?php
$in         = $arrival;
$out        = $departure;
$days       = (strtotime($out) - strtotime($in)) / (60 * 60 * 24);
$servicetax = 8.5;
$bharat     = 2.5;
$all_days = $days * $rate;
$st = $all_days * 0.085;
$bc = $all_days * 0.025;
$total = $all_days + $st + $bc;
?>

<!-- Inside Title -->
<div class="inside_title image_bck bordered_wht_border white_txt" data-image="images/city.jpg ">
    <!-- Over -->
    <div class="over" data-opacity="0.2" data-color="#000"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h1>Book Room's</h1></div>
            <div class="col-md-6 text-right"><div class="breadcrumbs"><a href="<?= Url::to(['site/index']);?>">Home</a> Checkout</div></div>
        </div>
    </div>
</div>
<!-- Inside Title End -->
<!-- Content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="bordered_block col-md-12 grey_border">
                <div class="container">
                    <div class="row">
                        <!--Sidebar-->
                        <div class="col-md-8 col-xs-12">
                            <!-- Checkout -->
                            <div class="checkout">
                                <div class="checkout-row row">
                                    <div class="col-md-9">
                                        <h3 class="title">CHECKOUT FORM</h3>
                                        <hr>
                                        <!-- <form role="form"> -->
                                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'enableAjaxValidation' => false,
                                        'validateOnSubmit' => true]);?>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <!-- <input type="text" class="form-control" id="name" placeholder="Enter Primary Name"> -->
                                                <?php echo $form->field($model, 'title', ['enableAjaxValidation' => true,'options' => [['class' => 'form-control']]])->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Miss' => 'Miss', 'Dr' => 'Dr.', 'Col.' => 'Col.', 'Prof.' => 'Prof.', ['required' => true]])->label(false); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="name">First Name</label>
                                                <?=$form->field($model, 'first_name', ['options' => [['class' => 'form-control']]])->textInput(['maxlength' => true, 'placeholder' => 'First Name', 'required' => true])->label(false);?>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="name">Last Name</label>
                                                <?=$form->field($model, 'last_name', ['options' => [['class' => 'form-control']]])->textInput(['maxlength' => true, 'placeholder' => 'Last Name', 'required' => true])->label(false);?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="Gender">Gender</label></br>
                                            <?=$form->field($model, 'gender_1', ['options' => [['class' => 'radio-inline','required' => true]]])->radioList(['Male' => 'Male', 'Female' => 'Female'])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Date of Birth</label>
                                            <?=$form->field($model, 'dob', ['options' => [['class' => 'form-control date_departure']]])->input('date', ['required' => true])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="number">Mobile number</label>
                                            <?=$form->field($model, 'primary_mobile', ['options' => [['class' => 'form-control']]])->input('tel', ['required' => true,'integerOnly'=>true])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email">Email address:</label>
                                            <?=$form->field($model, 'primary_email', ['options' => [['class' => 'form-control']]])->input('email', ['required' => true, 'placeholder' => ''])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="address">Address</label>
                                            <?=$form->field($model, 'primary_address', ['options' => [['class' => 'form-control']]])->textArea(['rows' => '4',     'required' => true])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email">Country:</label>
                                            <?=$form->field($model, 'country', ['options' => [['class' => 'form-control']]])->textInput(['maxlength' => true,'required' => true, 'placeholder' => ''])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email">City:</label>
                                            <?=$form->field($model, 'city', ['options' => [['class' => 'form-control']]])->textInput(['maxlength' => true,'required' => true, 'placeholder' => ''])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email">Zip:</label>
                                            <?=$form->field($model, 'zip_code', ['options' => [['class' => 'form-control']]])->textInput(['maxlength' => true,'required' => true, 'placeholder' => ''])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="photo-id_type">Photo ID Type</label>
                                            <?php echo $form->field($model, 'id_type', ['options' => [['class' => 'form-control']]])->dropDownList(['Passport' => 'Passport', 'Aadhar Card' => 'Aadhar Card', 'Driving Licence' => 'Driving Licence', 'Voter ID' => 'Voter ID'])->label(false); ?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email">Photo ID Number:</label>
                                            <?=$form->field($model, 'id_number', ['options' => [['class' => 'form-control']]])->textInput(['maxlength' => true,'required' => true, 'placeholder' => ''])->label(false);?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for = "inputfile">Upload copy of your photo-id</label>
                                            <?= $form->field($model, 'file')->fileInput(['required' => true]) ?>
                                            <p class = "help-block">File size should not be more than 2MB</p>
                                        </div>
                                        <?=$form->field($model, 'room_type')->hiddenInput(['value' => $room_type])->label(false);?>
                                        <?=$form->field($model, 'check_in')->hiddenInput(['value' => $arrival])->label(false);?>
                                        <?=$form->field($model, 'check_out')->hiddenInput(['value' => $departure])->label(false);?>
                                        <div class="col-md-12">
                                            <label for="tnc"></label>
                                            <?=Html::checkbox('agree', ['required' => false]);?>I accept the booking <a href="#">Terms and Conditions</a>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout End-->
                        </div>
                        <!--Sidebar End-->
                        <!--Sidebar-->
                        <div class="checkout-row row">
                            <div class="col-md-4">
                                <div class="widget">
                                    <h3 class="title">Cart Total</h3>
                                    <div class="box">
                                        <div class="cart-total-item">
                                            <label>Room Boooked</label>
                                            <div class="price"><?php echo $room_type ?></div>
                                        </div>
                                        <div class="cart-total-item">
                                            <label>Room Rent</label> &nbsp <small>(Per day)</small>
                                            <div class="price"><?php echo $rate ?></div>
                                        </div>
                                        <div class="cart-total-item">
                                            <label>Sub Total</label>&nbsp<small> (From <b><?=$arrival;?></b> To <b><?=$departure;?></b> )</small>
                                            <div class="price"><?php echo $all_days ?></div>
                                            <div class="row">
                                            </div>
                                        </div>
                                        <div class="cart-total-item">
                                            <label>Service Tax (8.5%)  </label>
                                            <div class="price"><?=$st;?></div>
                                        </div>
                                        <div class="cart-total-item">
                                            <label>Swach Bharat Cess (2.5%)  </label>
                                            <div class="price"><?= $bc ?></div>
                                        </div>
                                        <div class="cart-total-item order-total">
                                            <label>Total Price</label>
                                            <div class="price">Rs.<?= $total ?></div>
                                        </div>
                                    </div>
                                    <h3 class="title">Payment Method</h3>
                                    <div class="box">
                                        <div class="payment-method">
                                            <div class="payment-item">
                                                <?= $form->field($model, 'payment_method')->radioList(['1' => 'On-site payment', '2' => 'Online payment'])->label(false) ?>

                                            </div>
                                    </div>
                                    <a href="<?php echo Url::to(['site/confirmation']); ?>">
                                        <?=Html::submitButton('Check out', ['class' => 'button btn-checkout btn btn-default'], Html::tag('em', ' ', ['class' => 'fa-icon'], Html::tag('i', ' ', ['class' => 'fa fa-arrow-right'])));?>
                                        <!-- <button type="button" title="Check out" class="button btn-checkout btn btn-default">
                                        <em class="fa-icon"><i class="fa fa-arrow-right"></i></em>
                                        <span>Check out</span>
                                        </button> -->
                                    </a>
                                </div>
                                <?php ActiveForm::end();?>
                                <div class="widget">
                                    <h6 class="title">Returns Policy</h6>
                                    <p>
                                        If the room is cancelled within 24 hours of the stay, then only 10% of the total booking amount will be deducted.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--Sidebar End-->
                    </div>
                    <!--Row End-->
                </div>
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
<!-- Content End -->
<!-- Content End -->
    <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
    <?php $this->endContent(); ?>
</div>
<!-- Page End -->


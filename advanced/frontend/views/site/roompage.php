<?php
use yii\db\Query;
use yii\helpers\Html;
//use dosamigos\datepicker\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<style type="text/css">
.add-to-b {
padding: 20px 0;
margin: 20px 0;
</style>


<?php
$query = new Query;
$todo  = (new yii\db\Query())
->select(['images', 'id'])
->from('room_types')
->andWhere("room_id = '$model->room_id'")
->all();
?>


<!-- Inside Title -->
<div class="inside_title image_bck bordered_wht_border white_txt" data-image="images/superior_suite2.jpg ">
    <!-- Over -->
    <div class="over" data-opacity="0.2" data-color="#000"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h1><?php echo Html::encode($data->room_type); ?></h1></div>
            <div class="col-md-6 text-right"><div class="breadcrumbs"><a href="<?php echo Url::to(['/site/index']);?>">Home</a><?php echo Html::encode($data->room_type); ?></div></div>
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
                        <div class="col-md-9 col-md-push-3 col-xs-12">
                            <!-- Carousel and Anons -->
                            <div class="row product_inside">
                                <div class="col-md-6 col-xs-12">
                                    <!-- Carousel -->
                                    <?php
                                    foreach ($todo as $key => $row) {
                                    foreach (explode(';', rtrim($row['images'], ';')) as $key_img => $value_img) {
                                    $items = [
                                    [
                                    'url' => $value_img,
                                    'src' => $value_img,
                                    ],
                                    ];
                                    }
                                    echo dosamigos\gallery\Gallery::widget(['items' => $items]);
                                    }
                                    ?>
                                    <!-- Carousel End -->
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <h3 class="title"><?php echo Html::encode($data->room_type); ?></h3>
                                    <div class="meta-box clearfix">
                                        <div class="price-box">
                                            <span class="special-price">Rs.<?php echo Html::encode($data->rate); ?> /Day</span>
                                        </div>
                                    </div>
                                    <p><?php //echo Html::decode($data->description); ?>
                                        <section class="boxes" id="book">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="row">
                                                        <?php $form = ActiveForm::begin(['action' => ['site/checkout'], 'method' => 'POST']);?>
                                                        <div class="col-md-5">
                                                            <label>Arrival</label>
                                                            <?= $form->field($model, 'arrival')->input('date', ['required' => true])->label(false); ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>Departure</label>
                                                            <?= $form->field($model, 'departure')->input('date', ['required' => true])->label(false); ?>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-md-5">
                                                            <label>Adult</label>
                                                            <?=$form->field($model, 'adult', ['options' => ['id' => 'adult','required' => true]])->dropDownList([1 => '1', 2 => '2', 3 => '3', 4 => '4'])->label(false)?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>Child (3-12)</label>
                                                            <?=$form->field($model, 'child', ['options' => ['id' => 'child']])->dropDownList(['0' => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4'])->label(false)?>
                                                        </div>
                                                    </div>
                                                    <!-- Row End -->
                                                </div>
                                                <!-- Row End -->
                                            </div>
                                        </section>
                                    </p>
                                    <div class="add-to-b">
                                        <?=$form->field($model, 'room_type')->hiddenInput(['value' => $data->room_type])->label(false);?>
                                        <?=$form->field($model, 'rate')->hiddenInput(['value' => $data->rate])->label(false);?>
                                        <?=Html::submitButton('CHECKOUT', ['class' => 'button btn btn-default'])?>
                                    </div>
                                    <?php ActiveForm::end();?>
                                </div>
                                <!--Rooms amenities-->
                                <div>
                                    <center><h6 class="title" > <i class="fa fa-diamond"></i> Room Amenities</h6></center>
                                    <table id="table" class="table-responsive col-md-12 " style="padding:30px; margin:30px;">
                                        <tbody >
                                            <tr>
                                                <td> Double bed</td>
                                                <td>Sitting corner with Sofa or Armchairs</td>
                                            </tr>
                                            <tr>
                                                <td>Branded bath amenities</td>
                                                <td>Hairdryer</td>
                                            </tr>
                                            <tr>
                                                <td>Bathrobes and Slippers</td>
                                                <td>Safe Deposit Box</td>
                                            </tr>
                                            <tr>
                                                <td>LCD TV with satellite channels</td>
                                                <td>Mini-Bar</td>
                                            </tr>
                                            <tr>
                                                <td>Air conditioning</td>
                                                <td>Balcony or Terrace</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Room amenities-->
                            </div>
                            <hr>
                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab">
                                    <p><?php echo Html::decode($data->description); ?></p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledBy="profile-tab">
                                    <!--  Comments -->
                                    <section class="comments clearfix">
                                        <iframe src="https://www.facebook.com/plugins/comment_embed.php?href=https%3A%2F%2Fwww.facebook.com%2Fstorypick%2Fposts%2F1060213680690985%3Fcomment_id%3D1060322014013485&include_parent=false" width="560" height="161" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                    </section>
                                    <!-- End Comments -->
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
<?php $this->beginContent('@app/views/layouts/footer.php');?>
<?php $this->endContent();?>
</div>
<!-- Page End -->
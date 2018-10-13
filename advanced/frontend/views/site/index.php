<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use backend\models\RoomTypes;
use backend\models\RoomTypesSearch;
use yii\widgets\ActiveForm;
use yii\helpers\BaseHtml;
/* @var $this yii\web\View */
$this->title = 'Welcome To Berge Hotels: Best Of Its Kind';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="page" id="page">
            
            <!--Intro-->
            <section class="intro" >
                <!-- Down Arrow -->
                <a href="#welcome" class="down_block go"><i class="fa fa-angle-down"></i></a>
                <!-- Wrapper -->
                <div class="intro_wrapper">
                    <!-- Item -->
                    <div class="intro_item">
                        <!-- Over -->
                        <div class="over" data-opacity="0" data-color="#000"></div>
                        <!-- Image -->
                        <div class="into_back image_bck" data-image="<?php echo Html::encode($data->photo_1); ?>"></div>
                        
                        <!-- Text -->
                        <div class="text_content">
                            <div class="intro_text intro_text_lc text-left text_up">
                                <span class="great_title great_title_big"><?php echo Html::encode($data->photo_1_text); ?></span>
                                <span class="great_subtitle great_subtitle_big"><?php echo Html::encode($data->photo_1_subtext); ?></span>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="intro_item">
                        <!-- Over -->
                        <div class="over" data-opacity="0.4" data-color="#000"></div>
                        <!-- Image -->
                        <div class="into_back image_bck"  data-image="<?php echo Html::encode($data->photo_2); ?>">   </div>
                        
                        <!-- Text -->
                        <div class="text_content">
                            <div class="intro_text intro_text_rc text-right text_small text_up">
                                <span class="great_title great_title_big"><?php echo Html::encode($data->photo_1_text); ?></span>
                                <span class="great_subtitle great_subtitle_big"><?php echo Html::encode($data->photo_1_subtext); ?></span>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="intro_item">
                        <!-- Over -->
                        <div class="over" data-opacity="0" data-color="#000"></div>
                        <!-- Image -->
                        <div class="into_back image_bck" data-image="<?php echo Html::encode($data->photo_3); ?>"></div>
                        
                        <!-- Text -->
                        <div class="text_content">
                            <div class="intro_text intro_text_lc text-left text_up">
                                <span class="great_title great_title_big"><?php echo Html::encode($data->photo_3_text); ?></span>
                                <span class="great_subtitle great_subtitle_big"><?php echo Html::encode($data->photo_3_subtext); ?></span>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="intro_item">
                        <!-- Over -->
                        <div class="over" data-opacity="0.4" data-color="#000"></div>
                        <!-- Image -->
                        <div class="into_back image_bck"  data-image="<?php echo Html::encode($data->photo_4); ?>">   </div>
                        
                        <!-- Text -->
                        <div class="text_content">
                            <div class="intro_text intro_text_rc text-right text_small text_up">
                                <span class="great_title great_title_big"><?php echo Html::encode($data->photo_4_text); ?></span>
                                <span class="great_subtitle great_subtitle_big"><?php echo Html::encode($data->photo_4_subtext); ?></span>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Wrapper End -->
                
            </section>
            <!-- Intro End -->
            <!-- Slider Border -->
            <div class="after_slider_border"></div>
            <!-- Services Slider -->
            <section class="boxes reviews" id="services">
                <div class="container-fluid">
                    
                    <!-- Title -->
                    <h4 class="sml_abs_title in">Our Services</h4>
                    <!-- Wrapper -->
                    <div class="mid_wrapper">
                        <!-- Item -->
                        <div class="bordered_block flex_block image_bck bordered_zoom height400">
                            <div class="image_over image_bck" data-image="images/hotel_m1.jpg"></div>
                            <a href="#" class="box_link"></a>
                            <div class="box_content">
                                <h3>The Berg Restaurant</h3>
                                <p><span class="btn">See More</span></p>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="bordered_block flex_block image_bck bordered_zoom height400">
                            <div class="image_over image_bck" data-image="images/pool.jpg"></div>
                            <a href="#" class="box_link"></a>
                            <div class="box_content">
                                <h3>INFINITY POOL</h3>
                                <p><span class="btn">See More</span></p>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="bordered_block flex_block image_bck bordered_zoom height400">
                            <div class="image_over image_bck" data-image="images/hotel1.jpg"></div>
                            <a href="#" class="box_link"></a>
                            <div class="box_content">
                                <h3>A PERFECT LOCATION</h3>
                                <p><span class="btn">See More</span></p>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="bordered_block flex_block image_bck bordered_zoom height400">
                            <div class="image_over image_bck" data-image="images/room.jpg"></div>
                            <a href="<?php echo Url::to(['site/roomcatalogue']); ?>" class="box_link"></a>
                            <div class="box_content">
                                <h3>All The Berg ROOMS</h3>
                                <p><span class="btn">See More</span></p>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="bordered_block flex_block image_bck bordered_zoom height400">
                            <div class="image_over image_bck" data-image="images/exc.jpg"></div>
                            <a href="#" class="box_link"></a>
                            <div class="box_content">
                                <h3>The Berg EXCURSIONS</h3>
                                <p><span class="btn">See More</span></p>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="bordered_block flex_block image_bck bordered_zoom height400">
                            <div class="image_over image_bck" data-image="images/hotel_m9.jpg"></div>
                            <a href="#" class="box_link"></a>
                            <div class="box_content">
                                <h3>The Berg Cocktail & Lounge</h3>
                                <p><span class="btn">See More</span></p>
                            </div>
                        </div>
                    </div>
                    <!-- Wrapper End -->
                </div>
            </section>
            <!-- Services End -->
            <!-- Welcome -->
            <section class="boxes" id="welcome">
                <div class="container-fluid">
                    <div class="row">
                        
                        <!-- col -->
                        <div class="col-md-12 bordered_block grey_border image_bck" data-image="images/white_back.jpg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h2>Welcome to Berg Hotel</h2>
                                        <h4 class="subtitle">A PARADISE BETWEEN LAND AND SEA</h4>
                                        <p>Experience true grandeur at The Berge Hotels, the iconic sea-facing landmark in South Mumbai.This flagship Berge hotel offers you splendid views of the Arabian Sea and Gateway of India, alongside refined century-old hospitality.</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <!-- Col End -->
                    </div>
                    <!-- Welcome Image -->
                    <div class="intro_image intro_text_rb text-center z0 wow fadeInUp" data-wow-duration="2s">
                        <img src="images/businessman.png" alt="">
                    </div>
                </div>
            </section>
            <!-- Welcome End -->
            <!-- Book -->
            <section class="boxes" id="book">
                <div class="container-fluid">
                    
                    <!-- Title -->
                    <h4 class="sml_abs_title wow fadeInUp">Book Now</h4>
                    
                    <div class="row">
                        
                        <div class="col-md-12 bordered_block bordered_wht_border white_txt image_bck" data-image="images/hotel2.jpg">
                            
                            <!-- Over -->
                            <div class="over" data-opacity="0.5" data-color="#000"></div>
                            
                            <div class="container text-left">
                                <div class="row">
                                    
                                    <?php //$form = ActiveForm::begin(['action' =>'/site/roomsearch','method'=> 'post','options'=>['enctype'=>'multipart/form-data','id' =>'booknow','class' => 'form']]); ?>
                                    
                                    <?php $form = ActiveForm::begin(['action' =>['site/roomsearch'],'method' => 'post']); ?>
                                    <div class="col-md-3 book_item">
                                        <label>Arrival</label>
                                        <!-- <input type="text" value="" class="form-control date_arrival" id="arrival"> -->
                                        <?= $form->field($model, 'arrival')->textInput(['id'=>'arrival','class' => 'form-control date_departure'])?>
                                    </div>
                                    <div class="col-md-3 book_item">
                                        <label>Departure</label>
                                        <!-- <input type="text" value="" class="form-control date_departure" id="departure"> -->
                                        <?= $form->field($model, 'departure')->textInput(['class' => 'form-control date_departure','id'=>'departure'])?>
                                    </div>
                                    <div class="col-md-2 book_item">
                                        <label>Adult</label>
                                        <?= $form->field($model, 'adult',['options'=>['id'=>'adult']])->dropDownList([1=>'1',2=>'2',3=>'3',4=>'4'])->label(false) ?>
                                        
                                    </div>
                                    <div class="col-md-2 book_item">
                                        <label>Child (3-12)</label>
                                        <?= $form->field($model, 'child',['options'=>['id'=>'child']])->dropDownList(['None'=>'None',1=>'1',2=>'2',3=>'3',4=>'4'])->label(false) ?>
                                    </div>
                                    <div class="col-md-1 book_item">
                                        
                                        <?= Html::submitButton('Send', ['class' => 'btn btn-white']) ?>
                                        
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                                <!-- Row End -->
                            </div>
                            <!-- Container End -->
                            
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
            </section>
            <!-- Book End -->
            <!-- Our Story -->
            <section class="boxes" id="story">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 bordered_block grey_border image_bck" data-image="images/white_bck.html">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h3>Our Story</h3>
                                        <h4 class="subtitle">FOUR GENERATIONS, ONE PHILOSOPHY.</h4>
                                        <p>For more than two decades, our family-owned hotel has offered a warm, welcoming staff and a one-of-a-kind atmosphere combining an L.A. vibe with friendly charm in one of the city’s most vibrant neighborhoods. We are proud to have a staff that has been a part of our ongoing history, helping us to welcome back returning guests year after year.</p><p>
                                    The Berge is one of Los Angeles’ chicest boutique hotels. As a proud member of Preferred Hotel Group, a distinctive collection of properties sharing the common threads of excellence, culture and a commitment to superb hospitality, The Berge offers guests a unique sense of trust and reliability that come with this exclusive membership.</p>
                                    We look forward to welcoming you to The Berge Hotel.
                                </div>
                                <!-- Story Image -->
                                <div class="col-md-5">
                                    <div class="bordered_block flex_block image_bck bordered_zoom height400">
                                        <div class="image_over image_bck" data-image="images/old.jpg"></div>
                                        <a href="#" class="box_link"></a>
                                        <div class="box_content">
                                            <h3>The Berg History</h3>
                                            <p><span class="btn">See More</span></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <!-- Roe End -->
            </div>
        </section>
        
        <!-- Pool -->
        <section class="boxes" id="pool">
            <div class="container-fluid">
                
                <div class="row">
                    
                    <div class="col-md-12 bordered_block grey_border image_bck" data-image="images/white_back.jpg">
                        
                        <div class="container text-center-xs">
                            <h3>SWIMMING POOL</h3>
                            <h4 class="subtitle">A mesmerising infinity pool overlooking Capri.</h4>
                            
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <p>A lovely pool located in a quiet and private location and available to guests from May to October; with a wide solarium with lounge chairs, offers a relaxing and toning break during your visit to the beautiful Tuscan countryside.
                                    Staying at Relais Marignolle means getting away from the city's often chaotic traffic even though it is just 3 kilometers from downtown and 3 from the Florence-Impruneta highway entrance; this lets you spend more time relaxing and perhaps ending your day with a toning bath in the lovely pool.</p>
                                </div>
                                
                                <div class="col-sm-6">
                                    <span>Creative 60%</span>
                                    <div class="progress thin_progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-color="#ccc">
                                        </div>
                                    </div>
                                    <span>Technology 30%</span>
                                    <div class="progress thin_progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" data-color="#ccc">
                                        </div>
                                    </div>
                                    <span>Design 80%</span>
                                    <div class="progress thin_progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" data-color="#ccc">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Row End -->
                            
                            
                        </div>
                        <!-- Container End -->
                        
                    </div>
                    <!-- Col end -->
                </div>
                <!-- Row End -->
            </div>
        </section>
        <!-- Pool End -->
        <!-- Gallery -->
        <section class="boxes">
            <div class="container-fluid">
                <h4 class="sml_abs_title wow fadeInUp">Swimming Pool Gallery</h4>
                <div class="row">
                    <div class="col-md-12 no-padding bordered_block bordered_wht_border intro_wrapper">
                        <div class="image_bck height600" data-image="images/pool5.jpg"></div>
                        <div class="image_bck height600" data-image="images/pool3.jpg"></div>
                        <div class="image_bck height600" data-image="images/pool6.jpg"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery End -->
        
        <!--Reviews-->
        <section class="boxes reviews" id="reviews">
            <div class="container-fluid">
                <!-- Title -->
                <h4 class="sml_abs_title wow fadeInUp">Reviews</h4>
                <div class="row">
                    <!-- col -->
                    <div class="col-md-12 bordered_block image_bck white_txt" data-image="images/back3.jpg">
                        <!-- Over -->
                        <div class="over" data-opacity="0.6" data-image="images/overlay.png" data-color="#292929"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center wow fadeInUp">
                                    <!-- Wrapper -->
                                    <div class="review_single_wrapper">
                                        
                                        <?php
                                        foreach ($twitter as $tweet)
                                        {
                                        ?>
                                        <div class="reviews_single_item">
                                            <?php echo $tweet['twitter_link']; ?>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- Wrapper End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Col End -->
            </div>
            <!-- Row End -->
        </section>
        <!-- Reviews End -->
        <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
        <?php $this->endContent(); ?>
    </div>
</div>
<!-- Page End -->
</body>
</html>
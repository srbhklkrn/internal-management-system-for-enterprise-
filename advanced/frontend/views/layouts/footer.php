<?php
use yii\helpers\Html;
use backend\models\HotelInfo;
use backend\models\HotelInfoSearch;
use yii\helpers\Url;

?>
<?php $data = HotelInfo::find()->where(['id' => 1])->one(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Footer -->
<div class="footer white_txt bordered_wht_border image_bck" data-color="#0e0e0e">
    <div class="container">
        
        <div class="row">
            <div class="col-md-3 col-sm-2">
                
                <div class="widget">
                    <h4>Contacts</h4>
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone1); ?><br />
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone2); ?><br />
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone3); ?><br />
                    <span class="contacts_ti ti-mobile"></span><?php echo Html::encode($data->phone4); ?><br />
                    <span class="contacts_ti ti-email"></span><a href="mailto:<?php echo Html::encode($data->contact_email); ?>"><?php echo Html::encode($data->contact_email); ?></a><br />
                    <span class="contacts_ti ti-location-pin"></span><?php echo Html::encode($data->hotel_address); ?>
                </div>
                <!--end of widget-->
                
                
            </div>
            
            <div class="col-md-3 col-sm-2 hidden-xs">
                <div class="widget">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li>
                            <?= Html::a('Home', ['/site/index',['class' => 'smoothScroll']]) ?>
                        </li>
                        <li>
                            <?= Html::a('View Rooms', ['site/roomcatalogue',['class' => 'smoothScroll']]) ?>
                        </li>
                        <li>
                            <?= Html::a('Make Reservation', ['site/index','#' => 'book', ['class' => 'smoothScroll']]) ?>
                        </li>
                        <li>
                            <?= Html::a('About Us', ['site/about','#' => 'story', ['class' => 'smoothScroll']]) ?>
                        </li>
                        <li>
                            <?= Html::a('Portfolio', ['site/index','#' => 'reviews', ['class' => 'smoothScroll']]) ?>
                        </li>
                        <li>
                            <?= Html::a('Contact Us', ['site/writeus'/*,'#' => 'contacts', ['class' => 'smoothScroll']*/]) ?>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-3 hidden-xs">
                <div class="widget">
                    <h4>Latest Updates</h4>
                    <div  style="background-color:#E6E6FA">
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="3"></div>
                    </div>
                </div>
                <!--end of widget-->
            </div>
            
            <div class="col-md-3 col-sm-3 hidden-xs">
                
            </div>
            
        </div>
        <!--Row End-->
        
    </div>
    <!-- Container End -->
    
    <!-- Footer Copyrights -->
    <div class="footer_end">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-2">
                    <div class="logo text-left">
                        <a href="<?= Url::to(['site/index']);?>">
                            <b>Berg Hotels</b></br>
                            <small><h4>Best Of Its kind</h4></small>
                        </a>
                        
                    </div>
                    
                </div>
                <div class="col-md-6 col-sm-2">
                    
                    
                    <center>
                    <a href="#">
                        <i style="font-size: 3em;" class="ti-facebook"></i>
                    </a> &nbsp&nbsp
                    
                    
                    <a href="#">
                        <i style="font-size: 3em;" class="ti-twitter-alt"></i>
                    </a> &nbsp&nbsp
                    
                    
                    <a href="#">
                        <i style="font-size: 3em;" class="ti-youtube"></i>
                    </a>&nbsp&nbsp
                    <a href="#">
                        <i style="font-size: 3em;" class="ti-instagram"></i>
                    </a>&nbsp&nbsp
                    
                    </center>
                </div>
                <div class="col-md-3 col-sm-2">
                    <span class="sub">&copy; Copyright 2018 - The Berg</span>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Copyrights End -->
</div>
<!-- Footer End -->
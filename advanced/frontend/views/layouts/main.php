<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use backend\models\HotelInfo;
use backend\models\HotelInfoSearch;
/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>
<?php $data = HotelInfo::find()->where(['id' => 1])->one(); ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <!-- Passpartu -->
        <div class="passpartu passpartu_left"></div>
        <div class="passpartu passpartu_right"></div>
        <div class="passpartu passpartu_top"></div>
        <div class="passpartu passpartu_bottom"></div>
        <!-- Passpartu End -->
        
            <!-- Header -->
            <header class="white_bck">
                <!-- Header Top Line -->
                <div class="top_line clearfix">
                    <!-- Address -->
                    <span class="tl_item">
                        <span class="ti ti-location-pin"></span> <?php echo Html::encode($data->hotel_address); ?>
                    </span>
                    <!-- Mail -->
                    <span class="tl_item">
                        <span class="ti ti-email"></span> <a href="mailto:<?php echo Html::encode($data->contact_email); ?>"><?php echo Html::encode($data->contact_email); ?></a>
                    </span>
                    <!-- Phone -->
                    <div class="pull-right">
                        <span class="tl_item">
                            <span class="ti ti-mobile"></span> <?php echo Html::encode($data->phone1); ?> / <?php echo Html::encode($data->phone2); ?>
                        </span>
                    </div>
                    
                </div>
                <!-- Top Line End -->
                <!-- Logo -->
                <div class="logo pull-left">
                    <a href="#"><b>Berg Hotel</b></a>
                </div>
                <!-- Header Buttons -->
                <div class="header_btns_wrapper">
                    
                    <!-- Main Menu Btn -->
                    <div class="main_menu"><i class="ti-menu"></i><i class="ti-close"></i></div>
                    
                    <!-- Sub Menu -->
                    <div class="sub_menu">
                        <div class="sub_cont">
                            <ul>
                                <li>
                                    <?= Html::a('Home', ['/site/index',['class' => 'smoothScroll']]) ?>
                                </li>
                                <li>
                                    <?= Html::a('View Rooms', ['site/roomcatalogue',['class' => 'smoothScroll']]) ?>
                                </li>
                                <li>
                                    <?= Html::a('Make Reservation', ['site/index','#' => 'book', ['class' => 'smoothScroll']]) ?>
                                </li>
                                
                                <li class="width100">
                                    <?= Html::a('About Us', ['site/about','#' => 'story', ['class' => 'smoothScroll']]) ?>
                                </li>
                                <li>
                                    <?= Html::a('Portfolio', ['site/index','#' => 'reviews', ['class' => 'smoothScroll']]) ?>
                                </li>
                                <li>
                                    <?= Html::a('Contact Us', ['site/writeus'/*,'#' => 'contacts', ['class' => 'smoothScroll']*/]) ?>
                                </li>
                                
                                <!-- Search -->
                                <!-- <li class="right_sub no_arrow sub_min_width"><a href="#" class="parents"><i class="ti-search"></i></a>
                                <ul class="mega_menu">
                                    <li class="mega_sub bask_menu">
                                        <form>
                                            <input type="text" class="form-control" placeholder="Enter Your Keywords">
                                            <button type="submit" class="se_btn">
                                            <i class="ti-search"></i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li> -->
                            <!-- Search End-->
                        </ul>
                    </div>
                </div>
                <!-- Sub Menu End -->
            </div>
            <!-- Header Buttons End -->
            
            <!-- Up Arrow -->
            <a href="#page" class="up_block go"><i class="fa fa-angle-up"></i></a>
        </header>
        <!-- Header End -->


        
        <?= Alert::widget() ?>
        <?= $content ?>   
        
        <?php $this->endBody() ?>
        
    </body>
</html>
<?php $this->endPage() ?>
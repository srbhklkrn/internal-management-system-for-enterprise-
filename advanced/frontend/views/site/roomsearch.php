<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use yii\data\Pagination;
use backend\models\RoomTypes;
use backend\models\RoomTypesSearch;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<?php
$query      = RoomTypes::find();
        $pagination = new Pagination
            ([
            'defaultPageSize' => 8,
            'totalCount'      => $query->count(),
        ]);
$query = new yii\db\Query();
        $data  = $query->select(['room_id', 'room_type', 'images', 'rate','total_remain'])
            ->orderBy('room_id')
            ->from('room_types')
            ->where('total_remain' > 0)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
?>
<!-- Inside Title -->
<div class="inside_title image_bck bordered_wht_border white_txt" data-image="images/bb11.jpg ">
    <!-- Over -->
    <div class="over" data-opacity="0.2" data-color="#000"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h1>Offered Rooms</h1></div>
            <div class="col-md-6 text-right">
                <div class="breadcrumbs">
                    <a href="<?php echo Url::to(['/site/index']);?>">Home</a>Room Catalogue</div></div>
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
                                    
                                    <div class="row masonry">
                                        <!-- Item -->
                                        <?php foreach ($data as $key=>$row): ?>
                                        <div class="col-sm-6 masonry-item">
                                            <span class="product_photo bordered_wht_border">
                                                <?php
                                                foreach (explode(';',rtrim($row['images'],';')) as $key_img => $value_img)
                                                {
                                                $items = [
                                                [
                                                'url' => $value_img,
                                                'src' => $value_img,
                                                ],
                                                ];
                                                }
                                                echo dosamigos\gallery\Gallery::widget(['items' => $items]);
                                                ?>
                                            </span>
                                            <a href="<?php echo Url::to(['site/roompage', 'room_id' =>$row['room_id']]); ?>" class="product_item text-center">
                                                <span class="product_title"><?php echo $row['room_type']; ?></span>
                                                <span class="product_price">Rs.<?php echo $row['rate']; ?></span>
                                                 <span class="product_price">Only <?php echo $row['total_remain']; ?> Available</span>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                        <!-- Item End -->
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                <!--Sidebar End-->
                                
                                <!--Sidebar-->
                                <div class="col-md-3 col-md-pull-9 hidden-xs hidden-sm">
                                    
                                    <div class="widget">
                                        <h6 class="title">Reservation Details</h6>
                                        
                                        <div class="box">
                                            <div class="cart-total-item">
                                                <label>Arrival Date</label>
                                                <div class="price"><?= $arrival; ?></div>
                                            </div>
                                            <div class="cart-total-item">
                                                <label>Departure Date</label>
                                                <div class="price"><?= $departure; ?></div>
                                            </div>
                                            <div class="cart-total-item">
                                                <label>Adult</label>
                                                <div class="price"><?= $adult; ?></div>
                                            </div>
                                            <div class="cart-total-item order-total">
                                                <label>Child</label>
                                                <div class="price"><?= $child; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    
                                    <div class="widget">
                                        <h6 class="title">Cancellation & Returns Policy</h6>
                                        <p><i>Only Cancelled bookings will be provided refunds. </i><br></p>
                                        <p>* Up to 48 hours prior to Checkin date - No cancellation fee.<br>
                                            * From 48 hours up to Checkin date - 01 Night Retention.<br>
                                        *No Show - No Refund.<br></p>
                                        
                                    </p>
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
    <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
    <?php $this->endContent(); ?>
</div>
<!-- Page End -->
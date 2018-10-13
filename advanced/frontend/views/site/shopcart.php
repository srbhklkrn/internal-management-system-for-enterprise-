<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>


<!-- Inside Title -->
<div class="inside_title image_bck bordered_wht_border white_txt" data-image="images/shop1.jpg ">
    <!-- Over -->
    <div class="over" data-opacity="0.2" data-color="#000"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h1>Shop Cart</h1></div>
            <div class="col-md-6 text-right"><div class="breadcrumbs"><a href="#">Home</a><a href="#">Shop</a>Shop Cart</div></div>
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
                        <div class="col-md-9 col-xs-12">
                            
                            <div class="cart">
                                <div class="cart-table">
                                   
                                    <div class="row row-title">
                                        <div class="col-md-5 col-xs-4 table_head"><span>Item</span></div>
                                        <div class="col-md-2 col-xs-2 table_head"><span>Price</span></div>
                                        <div class="col-md-2 col-xs-3 table_head"><span>Quanlity</span></div>
                                        <div class="col-md-2 col-xs-2 table_head"><span>Total</span></div>
                                    </div>
                                    
                                    <!--Item-->
                                    <div class="row">
                                        <div class="product_item_line name-item col-md-5 col-sm-5 col-xs-12">
                                            <a class="product-image" href="#">
                                                <img alt="" src="images/rooms/double_room.jpg">
                                            </a>
                                            <div class="product-info">
                                                <a href="#">Double Room</a>
                                                <p>Subtitle sample</p>
                                            </div>
                                        </div>
                                        <div class="product_item_line price-item col-md-2 col-sm-2 col-xs-3">
                                            <span class="cart-price">$729.00</span>
                                        </div>
                                        <div class="product_item_line qty-item col-md-2 col-sm-2 col-xs-3">
                                            <div class="add-to-cart">
                                                <input type="text" class="form-control qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <span class="increase-qty"><i class="fa fa-sort-up"></i></span>
                                                <span class="decrease-qty"><i class="fa fa-sort-down"></i></span>
                                            </div>
                                        </div>
                                        <div class="product_item_line price-item col-md-2 col-sm-2 col-xs-3"><span class="cart-price">$729.00</span></div>
                                        <div class="product_item_line delete-item col-md-1 col-sm-1 col-xs-3"><a href="#"><i class="fa fa-times-circle"></i></a></div>
                                    </div>
                                    
                                    <!--Item-->
                                    <div class="row">
                                        <div class="product_item_line name-item col-md-5 col-sm-5 col-xs-12">
                                            <a class="product-image" href="#">
                                                <img alt="" src="images/rooms/single_room2.jpg">
                                            </a>
                                            <div class="product-info">
                                                <a href="#">Single Rooms </a>
                                                <p>Subtitle sample</p>
                                            </div>
                                        </div>
                                        <div class="product_item_line price-item col-md-2 col-sm-2 col-xs-3">
                                            <span class="cart-price">$529.00</span>
                                        </div>
                                        <div class="product_item_line qty-item col-md-2 col-sm-2 col-xs-3">
                                            <div class="add-to-cart">
                                                <input type="text" class="form-control qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <span class="increase-qty"><i class="fa fa-sort-up"></i></span>
                                                <span class="decrease-qty"><i class="fa fa-sort-down"></i></span>
                                            </div>
                                        </div>
                                        <div class="product_item_line price-item col-md-2 col-sm-2 col-xs-3"><span class="cart-price">$529.00</span></div>
                                        <div class="product_item_line delete-item col-md-1 col-sm-1 col-xs-3"><a href="#"><i class="fa fa-times-circle"></i></a></div>
                                    </div>

                                    <!--Item-->
                                    <div class="row">
                                        <div class="product_item_line name-item col-md-5 col-sm-5 col-xs-12">
                                            <a class="product-image" href="#">
                                                <img alt="" src="images/rooms/junior_suite1.jpg">
                                            </a>
                                            <div class="product-info">
                                                <a href="#">Junior Suite </a>
                                                <p>Subtitle sample</p>
                                            </div>
                                        </div>
                                        <div class="product_item_line price-item col-md-2 col-sm-2 col-xs-3">
                                            <span class="cart-price">$1029.00</span>
                                        </div>
                                        <div class="product_item_line qty-item col-md-2 col-sm-2 col-xs-3">
                                            <div class="add-to-cart">
                                                <input type="text" class="form-control qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <span class="increase-qty"><i class="fa fa-sort-up"></i></span>
                                                <span class="decrease-qty"><i class="fa fa-sort-down"></i></span>
                                            </div>
                                        </div>
                                        <div class="product_item_line price-item col-md-2 col-sm-2 col-xs-3"><span class="cart-price">$1029.00</span></div>
                                        <div class="product_item_line delete-item col-md-1 col-sm-1 col-xs-3"><a href="#"><i class="fa fa-times-circle"></i></a></div>
                                    </div>


                                </div>
                                <div class="cart-collaterals row">
                                    
                                    <div class="cart-total col-md-12">
                                        <h3 class="title">Cart Total</h3>
                                        <div class="box">
                                            <div class="cart-total-item">
                                                <label>Cart subtotal</label>
                                                <div class="price">$ 834</div>
                                            </div>
                                            <div class="cart-total-item">
                                                <label>Shipping fee</label>
                                                <div class="price">0</div>
                                            </div>
                                            <div class="cart-total-item order-total">
                                                <label>Order total price</label>
                                                <div class="price">$ 834</div>
                                            </div>
                                            <a href="<?php echo Url::to(['site/checkout']); ?>">
                                            <button type="button" title="Check out" class="button btn-checkout btn btn-default">
                                                <em class="fa-icon"><i class="fa fa-arrow-right"></i></em>
                                                <span>Check out</span>
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!--Sidebar End-->
                        


                        <!--Sidebar-->
                        <div class="col-md-3 hidden-xs hidden-sm">
                            

                             <div class="widget">
                                <h6 class="title">Shop Categories</h6>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">Single Room</a>
                                    </li>
                                    <li>
                                        <a href="#">Double Room</a>
                                    </li>
                                    <li>
                                        <a href="#">Junior Suite</a>
                                    </li>
                                    <li>
                                        <a href="#">Superior Suite</a>
                                    </li>
                                    <li>
                                        <a href="#">Executive Suite</a>
                                    </li>
                                    <li>
                                        <a href="#">Family Suite</a>
                                    </li>
                                     <li>
                                        <a href="#">Grande Suite</a>
                                    </li>
                                </ul>
                            </div>

                           
                

                            <div class="widget">
                                <h6 class="title">Product Filter</h6>
                                <div class="widget widget-price-filter">
                                    <span class="min-filter">$<span id="price-filter-value-1">100</span></span>  
                                    <span class="max-filter">$<span id="price-filter-value-2">700</span></span>
                                    <div id="price-filter"></div>                                                
                                    <a href="#" class="btn btn-default">Filter</a>
                                </div>
                            </div>
                

                            <div class="widget">
                                <h6 class="title">Popular Items</h6>
                                <ul class="list-unstyled recent-posts">
                                    <li>
                                        <a href="#" class="clearfix recent_item">
                                            <span class="recent_photo"><img src="images/rooms/junior_suite2.jpg" alt=""></span>
                                            <span class="recent_txt">Junior Suite<br />$57.44</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix recent_item">
                                            <span class="recent_photo"><img src="images/rooms/grand_suite1.jpg" alt=""></span>
                                            <span class="recent_txt">Grande Suite<br />$37.44</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="clearfix recent_item">
                                            <span class="recent_photo"><img src="images/rooms/single_room2.jpg" alt=""></span>
                                            <span class="recent_txt">Single Room<br />$17.44</span>
                                        </a>
                                    </li>
                                </ul>
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
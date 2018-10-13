<?php
use dosamigos\chartjs\ChartJs;
use yii\db\Connection;
use yii\helpers\Url;
$connection = \Yii::$app->db;
$db         = new yii\db\Connection([
'dsn'      => 'mysql:host=localhost;dbname=hotel',
'username' => 'root',
'password' => '',
'charset'  => 'utf8',
]);
$this->title = 'Dashboard';
?>
<!-- Info boxes -->
<div class="col-md-12">
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-cog"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Today's<br> Resrvations</span>
          <span class="info-box-number"><?php echo $today; ?></span>
          </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
          </div><!-- /.col -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-check-square-o"></i></span>
              <a href="<?=Url::to('?r=create-bookings/checkin')?>">
                <div class="info-box-content">
                  <span class="info-box-text">Today's<br> Arrivals</span>
                  <span class="info-box-number"><?php echo $today_check_in; ?></span>
                </a>
                </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-plane"></i></span>
                    <a href="<?=Url::to('?r=create-bookings/checkout')?>">
                      <div class="info-box-content">
                        <span class="info-box-text">Today's<br> Departures</span>
                        <span class="info-box-number"><?php echo $today_check_out; ?></span>
                      </a>
                      </div><!-- /.info-box-content -->
                      </div><!-- /.info-box -->
                      </div><!-- /.col -->
                    </div>
                  </div>
                  <!-- Left col -->
                  <div class="row">
                    <div class="col-md-6">
                      <!-- TABLE: LATEST ORDERS -->
                      <div class="box box-info">
                        <div class="box-header with-border">
                          <h3 class="box-title">Latest Booking Activity</h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <div class="table-responsive">
                              <table class="table no-margin">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Booking ID</th>
                                    <th>Room</th>
                                    <th>Status</th>
                                    <th>Guest Name</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $i = 1;
                                  foreach ($lorders as $row) {
                                  ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['booking_id']; ?></td>
                                    <td><?php echo $row['room_type']; ?></td>
                                    <td><span class="label label-success"><?php echo $row['booking_status']; ?></td>
                                    <td><?php echo $row['title']; ?> <?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
                                  </tr >
                                  <?php
                                  $i++;
                                  }
                                  ?>
                                </tbody>
                              </table>
                              </div><!-- /.table-responsive -->
                              </div><!-- /.box-body -->
                              <div class="box-footer clearfix">
                                <a href="index.php?r=bookings%2Fcreate" class="btn btn-sm btn-info btn-flat pull-left">Create New Bookings</a>
                                <a href="index.php?r=bookings" class="btn btn-sm btn-default btn-flat pull-right">View All Bookings</a>
                                </div><!-- /.box-footer -->
                                </div><!-- /.box -->
                              </div>
                              <!-- Left col -->
                              <div class="col-md-6">                      <!-- PRODUCT LIST -->
                              <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Recently Added Feedbacks/Requests</h3>
                                  <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                  </div>
                                  </div><!-- /.box-header -->
                                  <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                      <table class="table no-margin">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Message</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $i = 1;
                                          foreach ($writeus as $row) {
                                          ?>
                                          <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['first_name']; ?></td>
                                            <td><?php echo $row['last_name']; ?></td>
                                            <td><?php echo $row['message']; ?></td>
                                          </tr >
                                          <?php
                                          $i++;
                                          }
                                          ?>
                                        </tbody>
                                      </table>
                                    </ul>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer text-center">
                                      <a href="index.php?r=contact-us" class="uppercase">View All Responses</a>
                                      </div><!-- /.box-footer -->
                                      </div> </div> </div><!-- /.box -->
                              <div class="card-panel hoverable">
                                
                                <?= \yii2fullcalendar\yii2fullcalendar::widget(array('events'=> $events,));?>
                              </div>

                                      

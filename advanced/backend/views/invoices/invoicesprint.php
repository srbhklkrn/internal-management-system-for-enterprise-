<?php
use yii\helpers\Html;
?>
<?php
$servicecharge       = $data->service_charge;
$servicetax          = $data->service_tax;
$luxury              = $data->luxury_tax;
$bharat              = $data->swach_bharat_cess;
$discount            = $data->discount;
$staycharg           = $data->stay_charges;
$in                  = $data->check_in;
$out                 = $data->check_out;
$days                = (strtotime($out) - strtotime($in)) / (60 * 60 * 24);
$stay_discount       = $staycharg - $discount; // Stay Charges - Discount
$stay_service        = round($servicecharge / 100, 2) * $stay_discount; //Service Charges on amount obtain from Stay Charges - Discount.
$luxurytax           = round($luxury / 100, 2) * $stay_discount; // Luxury Tax on amount obtain from Stay Charges - Discount.
$ro                  = $stay_discount + $stay_service + $luxurytax;
$servicetax          = round($servicetax / 100, 2) * $ro; //Service tax on Total
$swachbharat         = round($bharat / 100, 2) * $ro; //Swach Bharat Tax on Total
$finalamount         = round($ro + $servicetax + $swachbharat, 0, PHP_ROUND_HALF_UP); //Total amount payabale to customer
$model->final_amount = $finalamount;
?>
<div class="card-panel hoverable">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
        <i class="fa fa-home"></i> Berge Hotels Inc.
        <small class="pull-right"><b>Date: </b> <?php echo Html::encode($data->created_date); ?></small>
        </h2>
        </div><!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-xs-3 invoice-col">
          From
          <address>
            <strong>Berge Hotels Inc.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
          </div><!-- /.col -->
          <div class="col-xs-4 invoice-col">
            To
            <address>
              <strong><b><?php echo Html::encode($data->first_name); ?> <?php echo Html::encode($data->last_name); ?></b> </strong><br>
              <?php echo Html::encode($data->primary_address); ?> <br>
              <?php echo Html::encode($data->city); ?>,
              <?php echo Html::encode($data->zip_code); ?> <br>
              <?php echo Html::encode($data->country); ?> <br>
              Phone: <?php echo Html::encode($data->primary_mobile); ?> <br>
              Email: <?php echo Html::encode($data->primary_email); ?>
            </address>
            </div><!-- /.col -->
            <div class="col-xs-3 invoice-col">
              <b>Invoice #<?php echo Html::encode($data->invoice_no); ?></b><br>
              <br>
              <b>Booking ID:</b> <?php echo Html::encode($data->booking_id); ?><br><br>
              <b>Room Type:</b> <?php echo Html::encode($data->room_type); ?><br>
              <b>Room Number:</b> <b style="color:red; font-size: 100%;font-family: Roboto;">       <?php echo Html::encode($data->room_number); ?></b><br><br>
              <b>Check-In:</b> <?php echo Html::encode($data->check_in); ?><br>
              <b>Check-Out:</b> <?php echo Html::encode($data->check_out); ?><br>
              </div><!-- /.col -->
              </div><!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-xs-12">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Product Description</th>
                        <th>Stay Charges</th>
                        <th>Discount</th>
                        <th>S.C</th>
                        <th>L.T</th>
                        <th>S.T</th>
                        <th>S.B.C</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td rowspan="7"><b>Room Type:</b> <?php echo Html::encode($data->room_type); ?>
                          <br>
                          <b>Duration Of Stay:</b><br>
                          From <i><?php echo Html::encode($data->check_in); ?> </i> To <i>
                          <?php echo Html::encode($data->check_out); ?> </i> <br>
                          <b>Number Of Days :</b> <?=$days?><br>
                          <b>Charges @ <i><?php echo Html::encode($data->rate); ?></i></b>
                          Per day
                        </td>
                        <td><?php echo $staycharg; ?></td>
                        <td><?=$discount?> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> <?=$stay_discount;?> </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td> <i><?php echo Html::encode($data->service_charge); ?> % </i></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?=$stay_service?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td><i><?php echo Html::encode($data->luxury_tax); ?> % </i></td>
                        <td></td>
                        <td></td>
                        <td><?=$luxurytax?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td><i><?php echo Html::encode($data->service_tax); ?> % </i></td>
                        <td></td>
                        <td><?=$servicetax;?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td></td>
                        <td></td>
                        <td><i><?php echo Html::encode($data->swach_bharat_cess); ?> % </i></td>
                        <td><?=$swachbharat;?></td>
                      </tr>
                    </tbody>
                  </table>
                  <div style="position: relative;float: right;width: 400px;border: 2px solid #73AD21;padding: 2px;">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr class="pull right">
                          <th>Total:</th>
                          <td> Rs. <?php echo Html::encode($data->final_amount); ?> <small> <i> (Inclusive All Taxes) </i> </small></td>
                          </tr>
                          <tr>
                          <th>Payment Made By:</th>
                          <td><b><i><?php echo Html::encode($data->payment); ?></i></b></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  </div><!-- /.col -->
                  </div><!-- /.row -->
                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-12">
                      <p class="lead">Payment Methods We Accept:</p>
                      <img src="credit/visa.png" alt="Visa">
                      <img src="credit/mastercard.png" alt="Mastercard">
                      <img src="credit/american-express.png" alt="American Express">
                      <img src="credit/paypal2.png" alt="Paypal">
                      
                      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        S.C =  Service Charges @ <i><?php echo Html::encode($data->service_charge); ?> %</i> On Stay Charges - Discount (If applicable) <br>
                        L.T =  Luxury Tax @ <i><?php echo Html::encode($data->luxury_tax); ?></i> % On Stay Charges - Discount (If applicable)<br>
                        S.T =  Service Tax @ <i><?php echo Html::encode($data->service_tax); ?></i> % on Stay Charges + S.C + L.T<br>
                        S.B.C = Swach Bharat Cess @ <i><?php echo Html::encode($data->swach_bharat_cess); ?></i> % on Stay Charges + S.C + L.T<br>
                      </p>
                      </div><!-- /.col -->
                      </div><!-- /.row -->
                      </section><!-- /.content -->
                      <div class="clearfix"></div>
                    </div>
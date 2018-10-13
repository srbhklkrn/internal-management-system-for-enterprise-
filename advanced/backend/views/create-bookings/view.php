<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use himiklab\thumbnail\EasyThumbnailImage;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\CreateBookings */

$this->title = $model->View ;
$this->params['breadcrumbs'][] = ['label' => 'Create Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="create-bookings-view">

<?php //$type = $model->room_type; echo $type; ?>

<div class="card-panel hoverable">

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Booking Details
                <small class="pull-right">Booking ID:<b><?php echo Html::encode($data->booking_id);?></b></small>
              </h2>
            </div><!-- /.col -->
          </div>

           <div class="row">
            <div class="col-xs-10">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th>Check-In Date.</th>
                    <td><?php echo Html::encode($data->check_in);?></td>
                    <th>Check-Out Date.</th>
                    <td><?php echo Html::encode($data->check_out);?></td>
                  </tr>
                  <tr>
                    <th>Check-In Time.</th>
                    <td><?php echo Html::encode($data->checkin_time);?></td>
                    <th>Check-Out Time.</th>
                    <td><?php echo Html::encode($data->checkout_time);?></td>
                   
                  </tr>
                   <tr>
                    <th>Room Type.</th>
                    <td><?php echo Html::encode($data->room_type); ?></td>
                    <th>Allotted Room</th>
                    <td style="color:red; font-size: 150%;font-family: Roboto;"><b><?php echo Html::encode($data->room_number);?></b></td>
                  </tr>
                  <tr> 
                    <th></th>
                    <td></td>
                    <th></th>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

      <div class="row">
          <div class="col-xs-12">
              <h2 class="page-header"><i class="fa fa-globe"></i> Guest Personal Details </h2>
          </div><!-- /.col -->
          </div> <!-- .row -->

           <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                  <tr>
                    <th>Name :</th>
                        <td><?php echo Html::encode($data->title); ?>
                            <?php echo Html::encode($data->first_name); ?>
                            <?php echo Html::encode($data->last_name); ?>
                        </td>
                  </tr>
                  <tr>
                    <th>Gender :</th>
                    <td><?php echo Html::encode($data->gender_1); ?></td>
                  </tr>

                   <tr>
                    <th>Mobile No. :</th>
                    <td><?php echo Html::encode($data->primary_mobile); ?></td>
                  </tr>
                  <tr>
                    <th>Email Address :</th>
                    <td><?php echo Html::encode($data->primary_email); ?></td>
                  </tr>
                  <tr>
                    <th>Identity Proof Type :</th>
                    <td><?php echo Html::encode($data->id_type); ?></td>
                  </tr>
                   <tr>
                    <th>Identity Image :</th>
                    <td>
                        <a href="#" id="pop" class="thumbnail">
        <img id="imageresource" style="width: 400px; height: 400px;" src="<?php echo Yii::getAlias('@web').'/'.$model->id_image; ?>">
                        </a> 
                            <div id="imagemodal" class="modal modal-fixed-footer">
                                  <div class="modal-content">
                                    <img src="" id="imagepreview" style="width: 400px; height: 400px;" >
                                  </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
     
                    </td>
                  </tr>
                  <tr>
                    <th>Date Of Birth :</th>
                    <td><?php echo Html::encode($data->dob); ?></td>
                  </tr>
                  <tr>
                    <th>Client Address :</th>
                    <td><?php echo Html::encode($data->primary_address); ?></td>
                  </tr>
                  <tr>
                    <th>Client City :</th>
                    <td><?php echo Html::encode($data->city); ?></td>
                  </tr>
                  <tr>
                    <th>Zip Code :</th>
                    <td><?php echo Html::encode($data->zip_code); ?></td>
                  </tr>
                   <tr>
                    <th>County :</th>
                    <td><?php echo Html::encode($data->country); ?></td>
                  </tr>
                  <tr>
                    <th></th>
                    <td></td>
                  </tr>
              
              </table>
              </div>
            </div><!-- /.col -->
      


                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                          'class' => 'btn btn-danger pull-right','style' => 'margin-right: 10px;',
                          'data' => [
                              'confirm' => 'Are you sure you want to delete this item?',
                              'method' => 'post',
                              ],
                          ]) ?>
                </div> <!-- .row no-print -->

          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
</div> <!-- .hoverable -->




























<?php
$script = <<< JS

$("#pop").on("click", function() 
{
   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});

JS;
$this->registerJs($script);
?>
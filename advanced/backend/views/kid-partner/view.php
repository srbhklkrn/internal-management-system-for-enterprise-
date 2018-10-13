
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use himiklab\thumbnail\EasyThumbnailImage;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\AdultPartner */

$this->title = $model->booking_id;
$this->params['breadcrumbs'][] = ['label' => 'Kid Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="create-bookings-view">

<div class="card-panel hoverable">

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->

      <div class="row">
          <div class="col-xs-12">
              <h2 class="page-header"><i class="fa fa-globe"></i> Kid Partner Details<small class="pull-right">Booking ID:<b><?php echo Html::encode($data->booking_id);?></b></small> </h2>
          </div><!-- /.col -->
          </div> <!-- .row -->

           <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                  <tr>
                    <th>Name :</th>
                        <td><?php echo Html::encode($data->kid_name); ?>
                        </td>
                  </tr>
                  <tr>
                    <th>Gender :</th>
                    <td><?php echo Html::encode($data->k_gender); ?></td>
                  </tr>
                  <tr>
                    <th>Age :</th>
                    <td><?php echo Html::encode($data->k_age); ?></td>
                    
                  </tr>

                  <tr>
                    <th>Kid Relation With Primary :</th>
                    <td><?php echo Html::encode($data->k_relation); ?></td>
                  </tr>
                  <tr>
                    <th>Identity Proof Type :</th>
                    <td><?php echo Html::encode($data->k_id_type); ?></td>
                  </tr>
                  <tr>
                    <th>Identity Proof Number :</th>
                    <td><?php echo Html::encode($data->k_id_number); ?></td>
                  </tr>
                   <tr>
                    <th>Identity Image :</th>
                    <td>
                        <a href="#" id="pop" class="thumbnail">
        <img id="imageresource" style="width: 300px; height: 300px;" src="<?php echo Yii::getAlias('@web').'/'.$model->k_id_image; ?>">
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
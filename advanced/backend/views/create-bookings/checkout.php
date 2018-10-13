<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
$this->title = 'Todays Check-out';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-panel hoverable">
  <!-- Todays Check-Out -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Todays Check-Out</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
              <tr>
                <th>#</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Booking ID</th>
                <th>Name </th>
                <th>Mobile </th>
                <th>Room</th>
                <th>Amount </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach ($chkout as $row)
              {
              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['check_in']; ?></td>
                <td><?php echo $row['check_out'];?></td>
                <td><?php echo $row['booking_id'];?></td>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['primary_mobile'];?></td>
                <td><?php echo $row['room_type'];?></td>
                <td><?php echo $row['stay_charges'];?></td>
                <?php
                $i++;
                }
                ?>
              </tr>
            </tbody>
          </table>
          </div><!-- /.table-responsive -->
          </div><!-- /.box-body -->
          </div><!-- /.box -->
          <div class="box-footer clearfix">
            <?= LinkPager::widget(['pagination' => $pagination]) ?>
          </div>
          </div><!-- /.col -->
        </div>
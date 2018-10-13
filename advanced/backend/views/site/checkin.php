<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Todays Check-in';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card-panel hoverable">

bla bla
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
                        </tr>

                      </thead>
                      <tbody>
                          <?php
                                $i=1;
                                  foreach ($chkin as $row)
                                {
                              ?>
                            <tr>          
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['check_in']; ?></td>
                                    <td><?php echo $row['check_out'];?></td>  
                                    <td><?php echo $row['booking_id'];?></td>  
                                    <td><?php echo $row['primary_name'];?></td>
                                    <td><?php echo $row['primary_mobile'];?></td>
                                    <td><?php echo $row['room_type'];?></td>                  
                              <?php
                                $i++;
                                }
                              ?>   
                        </tr>
                        
                      </tbody>

                    </table>
                  </div><!-- /.table-responsive -->
                  <div class="box-footer clearfix">
                          <?= LinkPager::widget(['pagination' => $pagination]) ?>
                        </div>
                </div><!-- /.box-body -->
                
                
                        
              </div><!-- /.box -->




</div>
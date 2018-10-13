<?php
use yii\helpers\Html;
use yii\db\Query;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomTypes */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$query = new Query;
$todo = (new yii\db\Query())
->select(['images'])
->from('room_types')
->andWhere("id = '$model->id'")
->all();
?>
<div class="room-types-view">
    <div class="card-panel hoverable">
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header"><i class="fa fa-globe"></i> Room Information </h2>
                    </div><!-- /.col -->
                    </div> <!-- .row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Room ID :</th>
                                    <td><?php echo Html::encode($data->room_id);?></td>
                                    
                                </tr>
                                <tr>
                                    <th>Room Type :</th>
                                    <td><?php echo Html::encode($data->room_type);?></td>
                                </tr>
                                <tr>
                                    <th>Total Available Rooms :</th>
                                    <td><?php echo Html::encode($data->total_count);?></td>
                                </tr>
                                <tr>
                                    <th>Room Status :</th>
                                    <td><?php echo Html::encode($data->status);?></td>
                                </tr>
                                <tr>
                                    <th>Extra Beds :</th>
                                    <td><?php echo Html::encode($data->extra_beds);?></td>
                                </tr>
                                <tr>
                                    <th>Total Adult Allowed :</th>
                                    <td><?php echo Html::encode($data->adults_count);?></td>
                                </tr>
                                <tr>
                                    <th>Total Child Allowed :</th>
                                    <td><?php echo Html::encode($data->child_count);?></td>
                                </tr>
                                <tr>
                                    <th>Description :</th>
                                    <td>

                                            <?php echo Html::decode($data->description); ?>


                                    </td>
                                </tr>
                                <tr>
                                    <th>Room Images  :</th>
                                    <td>

                                    <?php foreach ($todo as $key=>$row): ?>
                                        <?php
                                        foreach (explode(';',rtrim($row['images'],';')) as $key_img => $value_img)
                                        {
                                        ?>
                                        <table class="table table-striped">
                                            <tr>
                                                <td> 
                                                    <br> 

                                        <?php echo  Html::img(Yii::getAlias('@web').'/'.$value_img,['id'=>'imageresource','height'=> 350,'width'=> 450]);?>                  
                                                </td>
                                            </tr>
                                            
                                        </table>
                                        <?php
                                        }
                                        ?>
                                    <?php endforeach; ?>

                                    </td>
                                </tr>
                            </table>
                        </div>
                        </div><!-- /.col -->
                        
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
                            
                            </section><!-- /.content -->
                            </div><!-- /.content-wrapper -->
                            </div> <!-- .hoverable -->






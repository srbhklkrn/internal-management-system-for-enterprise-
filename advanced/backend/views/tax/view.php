<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\Tax */
$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Taxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-view">
    
    <div class="card-panel hoverable">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header"><i class="fa fa-globe"></i> Tax Information</h2>
                    </div><!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-xs-10">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <th>Name Of Tax</th>
                                <th>% </th>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Tax Category</th>
                                    <td><?php echo Html::encode($data->tax_category);?></td>
                                </tr>
                                <tr>
                                    <th>Service Charge %</th>
                                    <td><?php echo Html::encode($data->service_charge);?></td>
                                </tr>
                                <tr>
                                    <th>Service Tax %</th>
                                    <td><?php echo Html::encode($data->service_tax);?></td>
                                </tr>
                                <tr>
                                    <th>Luxury Tax %</th>
                                    <td><?php echo Html::encode($data->luxury_tax);?></td>
                                </tr>
                                <tr>
                                    <th>Swach Bharat Cess %</th>
                                    <td><?php echo Html::encode($data->swach_bharat_cess);?></td>
                                </tr>
                            </table>

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
                        </div><!-- /.col -->
                        </div><!-- /.row -->
                    </section>
                </div>
                
            </div>
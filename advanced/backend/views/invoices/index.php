<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\InvoicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="card-panel hoverable">
<div class="invoices-index">

   

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'responsive'=>true,
    'hover'=>true,
    'pjax' =>true,
    'resizableColumns'=>true,
    'panel' => [
    'heading'=>'<h3 class="panel-title"> <i class="glyphicon glyphicon-globe"></i> Invoices</h3>',
    //'type'=>'success',
    'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Add Invocies', ['create'], ['class' => 'waves-effect waves-light btn']),

    'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'waves-effect waves-light btn']),
    'footer'=>false
    ],
    'columns' => [
    ['class' => 'yii\grid\SerialColumn'],

    'id',
            'invoice_no',
            'booking_id',
            // 'status',
            // 'service_charge',
            // 'service_tax',
            // 'VAT',
            // 'luxury_tax',
            // 'swach_bharat_cess',
            // 'discount',
            // 'payment',
        ['class' => 'yii\grid\ActionColumn'],
    ],
    ]); 

    ?>

    

</div>
</div>

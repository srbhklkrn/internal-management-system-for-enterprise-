<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContactUsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact uses';
$this->params['breadcrumbs'][] = $this->title;
?>


    <div class="card-panel hoverable">

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'responsive'=>true,
    'hover'=>true,
    'pjax' =>true,
    'resizableColumns'=>true,
    'panel' => [
    'heading'=>'<h3 class="panel-title"> <i class="glyphicon glyphicon-globe"></i> Contact Us</h3>',
    //'type'=>'success',
    'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'waves-effect waves-light btn']),
    'footer'=>false
    ],
    'columns' => [
    ['class' => 'yii\grid\SerialColumn'],

            'first_name',
            'last_name',
            'city',
            'country',
            'email:email',
            'phone',
            'message:ntext',
            
            [
            'attribute'=>'created_date',
            'value' =>'created_date',
            
            'filter'=>DatePicker::widget([
    'model' => $searchModel,
    'attribute'=>'created_date',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy=M-dd'
        ]
])


            ],







            ['class' => 'yii\grid\ActionColumn'],
    ],
    ]); 

    ?>
    
</div>

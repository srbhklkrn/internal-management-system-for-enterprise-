<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoomTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Room Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-panel hoverable">
<div class="room-types-index">


    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'responsive'=>true,
    'hover'=>true,
    'pjax' =>true,
    'resizableColumns'=>true,
    'panel' => [
    'heading'=>'<h3 class="panel-title"> <i class="glyphicon glyphicon-globe"></i> Create Rooms</h3>',
    //'type'=>'success',
    'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Rooms', ['create'], ['class' => 'waves-effect waves-light btn']),

    'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'waves-effect waves-light btn']),
    'footer'=>false
    ],
    'columns' => [
    ['class' => 'yii\grid\SerialColumn'],

            'room_id',
            'room_type',
            'total_count',     
            'total_booked',
            'total_remain',
            'rate',
            //'description',





            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
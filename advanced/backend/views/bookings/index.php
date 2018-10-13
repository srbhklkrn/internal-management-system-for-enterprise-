<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Bookings;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BookingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Create Bookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-panel hoverable">
<div class="bookings-index">

    

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'responsive'=>true,
    'hover'=>true,
    'pjax' =>true,
    'resizableColumns'=>true,
    'panel' => [
    'heading'=>'<h3 class="panel-title"> <i class="glyphicon glyphicon-globe"></i> Create Bookings</h3>',
    //'type'=>'success',
    'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Bookings', ['create'], ['class' => 'waves-effect waves-light btn']),

    'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'waves-effect waves-light btn']),
    'footer'=>false
    ],
    'columns' => [
    ['class' => 'yii\grid\SerialColumn'],

    'booking_id',
    'room_type',
    'room_number',
    'first_name',
    'last_name',
    'check_in',
     [
        'class'=>'kartik\grid\EditableColumn',
        'attribute'=>'check_out',
        'hAlign'=>'center',
        'vAlign'=>'middle',
        'editableOptions' => 
                [
                'inputType'=>\kartik\editable\Editable::INPUT_DATE,
                'options' => [
                    'convertFormat'=>true, 
                    'pluginOptions' => ['format' => 'php:Y-m-d']
                ]
        ]
    ],
    [
    'class'=>'kartik\grid\EditableColumn',
    'attribute'=>'booking_status',
    'filter'=>array('CHECK IN' => 'CHECK IN', 'CHECK OUT' => 'CHECK OUT', 'CANCEL' => 'CANCEL', 'PROVISIONAL' => 'PROVISIONAL'),
    'editableOptions'=>
        [
            'header'=>'Change Status',
            'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
            'asPopover' => false,
            'data' => ['CHECK IN' => 'CHECK IN', 'CHECK OUT' => 'CHECK OUT','CANCEL'=>'CANCEL','PROVISIONAL'=>'PROVISIONAL'],
        ],
    
    ],
        'stay_charges',
        [
            'attribute' => 'id_image',
            'format'    => 'html',
            'label'     => 'ImageColumnLable',
            'value'     => function ($data) {
                return Html::img(Yii::getAlias('@web') . '/' . $data['id_image'],
                    ['width' => '60px']);
            },
        ],
        // 'primary_name',
        // 'gender_1',
        // 'primary_mobile',
        // 'primary_email:email',
        // 'id_type',
        // 'id_number',
        // 'id_image',
        // 'dob',
        // 'primary_address:ntext',
        // 'city',
        // 'country',
        ['class' => 'yii\grid\ActionColumn'],
    ],
    ]); 

    ?>

</div>
</div>

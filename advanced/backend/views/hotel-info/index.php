<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HotelInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hotel Infos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-panel hoverable">
    

    <p>
        <?= Html::a('Create Hotel Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'phone1',
            'phone2',
            'phone3',
            'phone4',
            'contact_email:email',
            'hotel_address:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

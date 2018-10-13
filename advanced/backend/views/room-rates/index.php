<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoomRatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Room Rates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-rates-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Room Rates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'room_type',
            'default_price',
            'extra_beds_charges',
            'price_monday',
            // 'price_tuesday',
            // 'price_wednesday',
            // 'price_thursday',
            // 'price_friday',
            // 'price_saturday',
            // 'price_sunday',
            // 'tax',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

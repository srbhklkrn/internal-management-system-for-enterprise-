<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'create_bookings_id',
            'adult_name',
            'adult_gender',
            'adult_mobile',
            'adult_age',
            'adult_relation',
            'adult_id_image',
            'adult_id_type',
            'adult_id_number',
            'k_name',
            'k_gender',
            'k_age',
            'k_relation',
            'k_id_image',
            'k_id_type',
            'k_id_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\PartnersSearch;
use backend\models\CreateBookings;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PartnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Partners', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'export' => true,
        //'Pjax' => false,
        'responsive'=>true,
        'hover'=>true, 
        'columns' => [

            
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model,$key,$index,$column)
                {
                    return Gridview::ROW_COLLAPSED;
                },
                'detail' => function ($model,$key,$index,$column)
                {
                $searchModel = new PartnersSearch();
                $book = new CreateBookings();
                $searchModel->create_bookings_id = $book->booking_id;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return Yii::$app->controller->renderPartial('_partner',
                [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                
                ]);
                },
            ],
            'create_bookings_id',
            'adult_name',
            'adult_gender',
            'adult_mobile',
            // 'adult_age',
            // 'adult_relation',
            // 'adult_id_image',
            // 'adult_id_type',
            // 'adult_id_number',
            // 'k_name',
            // 'k_gender',
            // 'k_age',
            // 'k_relation',
            // 'k_id_image',
            // 'k_id_type',
            // 'k_id_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

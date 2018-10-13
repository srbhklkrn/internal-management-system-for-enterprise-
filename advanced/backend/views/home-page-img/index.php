<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HomePageImgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Home Page Imgs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-page-img-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Home Page Img', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'photo_1',
            'photo_1_text:ntext',
            'photo_1_subtext:ntext',
            'photo_2',
            // 'photo_2_text:ntext',
            // 'photo_2_subtext:ntext',
            // 'photo_3',
            // 'photo_3_text:ntext',
            // 'photo_3_subtext:ntext',
            // 'photo_4',
            // 'photo_4_text:ntext',
            // 'photo_4_subtext:ntext',
            // 'img_1_name',
            // 'img_2_name',
            // 'img_3_name',
            // 'img_4_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

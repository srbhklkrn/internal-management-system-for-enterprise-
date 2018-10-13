<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\HomePageImg */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Home Page Imgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-page-img-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'photo_1',
            'photo_1_text:ntext',
            'photo_1_subtext:ntext',
            'photo_2',
            'photo_2_text:ntext',
            'photo_2_subtext:ntext',
            'photo_3',
            'photo_3_text:ntext',
            'photo_3_subtext:ntext',
            'photo_4',
            'photo_4_text:ntext',
            'photo_4_subtext:ntext',
            'img_1_name',
            'img_2_name',
            'img_3_name',
            'img_4_name',
        ],
    ]) ?>

</div>

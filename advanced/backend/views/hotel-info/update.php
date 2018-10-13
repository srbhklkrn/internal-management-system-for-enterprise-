<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HotelInfo */

$this->title = 'Update Hotel Info: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotel-info-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

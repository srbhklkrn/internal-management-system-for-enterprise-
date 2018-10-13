<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CreateBookings */

$this->title = 'Update Create Bookings: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Create Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="create-bookings-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

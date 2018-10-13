<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CreateBookings */

$this->title = 'Form';
$this->params['breadcrumbs'][] = ['label' => 'Create Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="create-bookings-create">

   <h1><?php  //Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

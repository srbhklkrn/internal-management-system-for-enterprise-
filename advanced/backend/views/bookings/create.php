<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Bookings */

$this->title = 'Create Bookings';
$this->params['breadcrumbs'][] = ['label' => 'Bookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookings-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
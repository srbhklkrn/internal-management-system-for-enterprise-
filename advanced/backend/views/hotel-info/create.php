<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HotelInfo */

$this->title = 'Create Hotel Info';
$this->params['breadcrumbs'][] = ['label' => 'Hotel Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotel-info-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

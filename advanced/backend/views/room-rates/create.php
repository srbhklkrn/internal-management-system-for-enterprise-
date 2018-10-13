<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RoomRates */

$this->title = 'Create Room Rates';
$this->params['breadcrumbs'][] = ['label' => 'Room Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-rates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

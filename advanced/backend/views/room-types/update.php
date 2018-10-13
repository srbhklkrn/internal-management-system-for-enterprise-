<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RoomTypes */

$this->title = 'Update Room Types: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-types-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

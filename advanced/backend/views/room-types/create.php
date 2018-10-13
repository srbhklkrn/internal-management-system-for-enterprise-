<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RoomTypes */

$this->title = 'Create Room Types';
$this->params['breadcrumbs'][] = ['label' => 'Room Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-types-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdultPartner */

$this->title = 'Update Adult Partner: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adult Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adult-partner-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

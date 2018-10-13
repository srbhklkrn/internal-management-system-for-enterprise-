<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactUs */

$this->title = 'Update Contact Us: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contact uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contact-us-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

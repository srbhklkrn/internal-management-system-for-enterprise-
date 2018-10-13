<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KidPartner */

$this->title = 'Update Kid Partner: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kid Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kid-partner-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

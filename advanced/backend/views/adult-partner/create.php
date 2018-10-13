<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AdultPartner */

$this->title = 'Create Adult Partner';
$this->params['breadcrumbs'][] = ['label' => 'Adult Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adult-partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

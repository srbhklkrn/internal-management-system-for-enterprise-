<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KidPartner */

$this->title = 'Create Kid Partner';
$this->params['breadcrumbs'][] = ['label' => 'Kid Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kid-partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Twitter */

$this->title = 'Create Twitter';
$this->params['breadcrumbs'][] = ['label' => 'Twitters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="twitter-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

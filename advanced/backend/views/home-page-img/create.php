<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\HomePageImg */

$this->title = 'Create Home Page Img';
$this->params['breadcrumbs'][] = ['label' => 'Home Page Imgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-page-img-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

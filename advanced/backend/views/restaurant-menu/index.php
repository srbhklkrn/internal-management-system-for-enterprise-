<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use backend\models\RestaurantMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RestaurantMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restaurant Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add Single Item', ['create'], ['class' => 'btn btn-success']) ?>
    
        <?= Html::a('Add Items From File', ['fileupload'], ['class' => 'btn waves-effect waves-teal']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'menu',
            'rate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>


<!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">


<div class="restaurant-menu-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data'] ]); ?>

   <?= $form->field($model, 'file')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>






    </div>
  </div>


  <?php
$script = <<< JS

 $(document).ready(function()
 {
        $('.modal-trigger').leanModal();  // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
  });



JS;
$this->registerJs($script);
?>

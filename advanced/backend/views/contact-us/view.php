<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactUs */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contact uses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="card-panel hoverable">

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'last_name',
            'city',
            'country',
            'email:email',
            'phone',
            'message:ntext',
        ],
    ]) ?>

    <!-- this row will not appear when printing -->
                  <div class="row no-print">
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger pull-right','style' => 'margin-right: 10px;',
                    'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                    ],
                    ]) ?>
                    </div> <!-- .row no-print -->

</div>

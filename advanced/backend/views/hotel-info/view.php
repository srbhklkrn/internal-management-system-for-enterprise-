<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\HotelInfo */
$this->title                   = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotel Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-panel hoverable">


    <?=DetailView::widget([
    'model'      => $model,
    'attributes' => [
        'id',
        'hotel_address:ntext',
        'phone1',
        'phone2',
        'phone3',
        'phone4',
        'contact_email:email',
    ],
])?>
    <div class="row no-print">
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success pull-right'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger pull-right', 'style' => 'margin-right: 10px;',
    'data'  => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method'  => 'post',
    ],
])?>
    </div>
</div>
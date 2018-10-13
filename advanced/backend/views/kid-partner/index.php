<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KidPartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Kid Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-panel hoverable">



    <p>
        <?=Html::a('Add Kid Partner', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => 'yii\grid\SerialColumn'],

        'booking_id',
        'kid_name',
        'k_gender',
        'k_age',
        'k_relation',
        [
            'attribute' => 'k_id_image',
            'format'    => 'html',
            'label'     => 'ImageColumnLable',
            'value'     => function ($data) {
                return Html::img(Yii::getAlias('@web') . '/' . $data['k_id_image'],
                    ['width' => '60px']);
            },
        ],

        //'k_id_image',
        'k_id_type',
        'k_id_number',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);?>

</div>

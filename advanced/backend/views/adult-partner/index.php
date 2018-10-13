<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdultPartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adult Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-panel hoverable">
    <p>
        <?= Html::a('Add Adult Partner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'booking_id',
            'first_name',
            'last_name',
            'adult_gender',
            'adult_mobile',
            'adult_relation',
            [
            'attribute' => 'adult_id_image',
            'format'    => 'html',
            'label'     => 'ImageColumnLable',
            'value'     => function ($data) {
                return Html::img(Yii::getAlias('@web') . '/' . $data['adult_id_image'],
                    ['width' => '60px']);
            },
        ],
            'adult_id_type',
            'adult_id_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

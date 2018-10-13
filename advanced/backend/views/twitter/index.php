<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TwitterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Twitters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="twitter-index">

     <div class="card-panel hoverable">

    <p>
        <?= Html::a('Add Tweets', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'twitter_link',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
</div>
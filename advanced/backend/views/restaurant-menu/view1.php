<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;
use backend\models\RestaurantMenu;

/* @var $this yii\web\View */
/* @var $model backend\models\RestaurantMenu */


$this->params['breadcrumbs'][] = ['label' => 'Restaurant Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
 <h1>File Has Been Uploaded</h1>

<ul>
<?php foreach ($countries as $restaurant_menu): ?>
    <li>
        <?= Html::encode("{$restaurant_menu->menu} ({$restaurant_menu->rate})") ?>:
       
    </li>
<?php endforeach; ?>
</ul>


<?= Html::a('<-Return Index', ['index'], ['class' => 'btn btn-success']) ?>




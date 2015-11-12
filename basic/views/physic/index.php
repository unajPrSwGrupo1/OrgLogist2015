<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PhysicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Physics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="physic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Physic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'large',
            'tall',
            'width',
            'maxWeight',
            'descript',
            'longUnit',
            'weightUnit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

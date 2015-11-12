<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadlimitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loadlimits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loadlimit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Loadlimit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'large',
            'width',
            'tall',
            'weight',
            // 'longUnit',
            // 'weightUnt',
            // 'descript',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

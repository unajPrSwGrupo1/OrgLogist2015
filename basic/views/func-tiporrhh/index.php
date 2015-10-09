<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FuncTiporrhhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Func Tiporrhhs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="func-tiporrhh-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Func Tiporrhh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idFunc',
            'link_func',
            'desc_func',
            'tiporrhh_idTipoRRHH',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

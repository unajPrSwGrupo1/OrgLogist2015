<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StockcenterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stockcenters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stockcenter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stockcenter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idStockCenter',
            'CantEstantes',
            'RRHH_idRRHH',
            'tiporrhh_idTipoRRHH',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

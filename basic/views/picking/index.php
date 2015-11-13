<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PickingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pickings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Picking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'num_picking',
            'idCaja',
            'idPedido',
            'cantidad_pedida',
            'cantidad_pickeada',
            // 'idEstante',
            // 'idStageArea',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecepcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recepcions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recepcion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Recepcion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idRecepcion',
            'idFactura',
            'idCaja',
            'cantidad_esperada',
            'cantidad_recibida',
            // 'idEstante',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

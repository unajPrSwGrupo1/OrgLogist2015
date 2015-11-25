<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CajaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Caja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCaja',
            'TipoCaja_idTipoCaja',
            'physic',
            ['attribute'=>'TipoCaja_idTipoCaja','value'=>'tipoCajaIdTipoCaja.Tipo'],//estoy metiendo las descripciones de las tablas relacionadas
            ['attribute'=>'physic','value'=>'physic0.descript'],//estoy metiendo las descripciones de las tablas relacionadas

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Nuevo contenido', ['tipo'], ['class' => 'btn btn-success']) ?>
    </p>

    
    <?= GridView::widget([
        'dataProvider' => $subDataProviderTipo,
        'filterModel' => $subSearchTipo,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Tipo',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <p>
        <?= Html::a('Nuevo tamaño', ['physic'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $subDataProviderPhy,
        'filterModel' => $subSearchPhy,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'large',
            'tall',
            'width',
            'maxWeight',
            'descript',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

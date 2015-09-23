<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransporteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transportes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transporte-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transporte', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTransporte',
            'Matricula',
            'Peso',
            'TIpoTransporte_idTIpoTransporte',
            'RRHH_idRRHH',
            // 'RRHH_TipoRRHH_idTipoRRHH',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTicket',
            'Descripcion',
            'MotivoTicket_idMotivoTicket',
            'RRHH_idRRHH',
            'tiporrhh_idTipoRRHH',
            // 'Transporte_idTransporte',
            // 'Transporte_TIpoTransporte_idTIpoTransporte',
            // 'Transporte_RRHH_idRRHH',
            // 'Transporte_tiporrhh_idTipoRRHH',
            // 'Fecha',
            // 'Hora',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

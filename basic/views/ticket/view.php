<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = $model->idTicket;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTicket' => $model->idTicket, 'MotivoTicket_idMotivoTicket' => $model->MotivoTicket_idMotivoTicket, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_RRHH_TipoRRHH_idTipoRRHH' => $model->Transporte_RRHH_TipoRRHH_idTipoRRHH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTicket' => $model->idTicket, 'MotivoTicket_idMotivoTicket' => $model->MotivoTicket_idMotivoTicket, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_RRHH_TipoRRHH_idTipoRRHH' => $model->Transporte_RRHH_TipoRRHH_idTipoRRHH], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTicket',
            'Descripcion',
            'MotivoTicket_idMotivoTicket',
            'RRHH_idRRHH',
            'RRHH_TipoRRHH_idTipoRRHH',
            'Transporte_idTransporte',
            'Transporte_TIpoTransporte_idTIpoTransporte',
            'Transporte_RRHH_idRRHH',
            'Transporte_RRHH_TipoRRHH_idTipoRRHH',
            'Fecha',
            'Hora',
        ],
    ]) ?>

</div>

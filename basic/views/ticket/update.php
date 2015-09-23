<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = 'Update Ticket: ' . ' ' . $model->idTicket;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTicket, 'url' => ['view', 'idTicket' => $model->idTicket, 'MotivoTicket_idMotivoTicket' => $model->MotivoTicket_idMotivoTicket, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_RRHH_TipoRRHH_idTipoRRHH' => $model->Transporte_RRHH_TipoRRHH_idTipoRRHH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Factura */

$this->title = $model->idFactura;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idFactura' => $model->idFactura, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idFactura' => $model->idFactura, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente], [
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
            'idFactura',
            'Monto',
            'RRHH_idRRHH',
            'RRHH_TipoRRHH_idTipoRRHH',
            'Cliente_idCliente',
            'Fecha',
            'Hora',
        ],
    ]) ?>

</div>

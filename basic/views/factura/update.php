<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Factura */

$this->title = 'Update Factura: ' . ' ' . $model->idFactura;
$this->params['breadcrumbs'][] = ['label' => 'Facturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFactura, 'url' => ['view', 'idFactura' => $model->idFactura, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'RRHH_TipoRRHH_idTipoRRHH' => $model->RRHH_TipoRRHH_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

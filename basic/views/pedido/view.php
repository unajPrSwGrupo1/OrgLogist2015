<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->idPedido;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPedido' => $model->idPedido, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPedido' => $model->idPedido, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH, 'Cliente_idCliente' => $model->Cliente_idCliente], [
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
            'idPedido',
            'cantCajas',
            'cantPallets',
            'RRHH_idRRHH',
            'tiporrhh_idTipoRRHH',
            'Cliente_idCliente',
            'Fecha',
            'Hora',
        ],
    ]) ?>

</div>

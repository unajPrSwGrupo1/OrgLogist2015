<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstanteHasCaja */

$this->title = $model->Estante_idEstante;
$this->params['breadcrumbs'][] = ['label' => 'Estante Has Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estante-has-caja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Estante_idEstante' => $model->Estante_idEstante, 'Estante_EstanteEstado_idEstanteEstado' => $model->Estante_EstanteEstado_idEstanteEstado, 'Caja_idCaja' => $model->Caja_idCaja, 'Caja_TipoCaja_idTipoCaja' => $model->Caja_TipoCaja_idTipoCaja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Estante_idEstante' => $model->Estante_idEstante, 'Estante_EstanteEstado_idEstanteEstado' => $model->Estante_EstanteEstado_idEstanteEstado, 'Caja_idCaja' => $model->Caja_idCaja, 'Caja_TipoCaja_idTipoCaja' => $model->Caja_TipoCaja_idTipoCaja], [
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
            'Estante_idEstante',
            'Estante_EstanteEstado_idEstanteEstado',
            'Caja_idCaja',
            'Caja_TipoCaja_idTipoCaja',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstanteHasCaja */

$this->title = 'Update Estante Has Caja: ' . ' ' . $model->Estante_idEstante;
$this->params['breadcrumbs'][] = ['label' => 'Estante Has Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Estante_idEstante, 'url' => ['view', 'Estante_idEstante' => $model->Estante_idEstante, 'Estante_EstanteEstado_idEstanteEstado' => $model->Estante_EstanteEstado_idEstanteEstado, 'Caja_idCaja' => $model->Caja_idCaja, 'Caja_TipoCaja_idTipoCaja' => $model->Caja_TipoCaja_idTipoCaja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estante-has-caja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

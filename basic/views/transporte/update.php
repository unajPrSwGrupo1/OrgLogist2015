<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transporte */

$this->title = 'Update Transporte: ' . ' ' . $model->idTransporte;
$this->params['breadcrumbs'][] = ['label' => 'Transportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTransporte, 'url' => ['view', 'idTransporte' => $model->idTransporte, 'TIpoTransporte_idTIpoTransporte' => $model->TIpoTransporte_idTIpoTransporte, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

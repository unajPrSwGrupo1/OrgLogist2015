<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = 'Update Caja: ' . ' ' . $model->idCaja;
$this->params['breadcrumbs'][] = ['label' => 'Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCaja, 'url' => ['view', 'idCaja' => $model->idCaja, 'TipoCaja_idTipoCaja' => $model->TipoCaja_idTipoCaja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'subModelTipo' => $subModelTipo,
        'subModelPhy' => $subModelPhy
    ]) ?>

</div>

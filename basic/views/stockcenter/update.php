<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stockcenter */

$this->title = 'Update Stockcenter: ' . ' ' . $model->idStockCenter;
$this->params['breadcrumbs'][] = ['label' => 'Stockcenters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idStockCenter, 'url' => ['view', 'idStockCenter' => $model->idStockCenter, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stockcenter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

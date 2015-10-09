<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hojaruta */

$this->title = 'Update Hojaruta: ' . ' ' . $model->idHojaRuta;
$this->params['breadcrumbs'][] = ['label' => 'Hojarutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idHojaRuta, 'url' => ['view', 'idHojaRuta' => $model->idHojaRuta, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $model->Transporte_tiporrhh_idTipoRRHH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hojaruta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

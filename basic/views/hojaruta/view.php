<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hojaruta */

$this->title = $model->idHojaRuta;
$this->params['breadcrumbs'][] = ['label' => 'Hojarutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hojaruta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idHojaRuta' => $model->idHojaRuta, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $model->Transporte_tiporrhh_idTipoRRHH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idHojaRuta' => $model->idHojaRuta, 'Transporte_idTransporte' => $model->Transporte_idTransporte, 'Transporte_TIpoTransporte_idTIpoTransporte' => $model->Transporte_TIpoTransporte_idTIpoTransporte, 'Transporte_RRHH_idRRHH' => $model->Transporte_RRHH_idRRHH, 'Transporte_tiporrhh_idTipoRRHH' => $model->Transporte_tiporrhh_idTipoRRHH], [
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
            'idHojaRuta',
            'Destino',
            'cantCajas',
            'cantPallets',
            'Transporte_idTransporte',
            'Transporte_TIpoTransporte_idTIpoTransporte',
            'Transporte_RRHH_idRRHH',
            'Transporte_tiporrhh_idTipoRRHH',
        ],
    ]) ?>

</div>

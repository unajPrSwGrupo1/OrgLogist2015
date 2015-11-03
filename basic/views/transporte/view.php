<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transporte */

$this->title = $model->idTransporte;
$this->params['breadcrumbs'][] = ['label' => 'Transportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transporte-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idTransporte' => $model->idTransporte, 'TIpoTransporte_idTIpoTransporte' => $model->TIpoTransporte_idTIpoTransporte, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idTransporte' => $model->idTransporte, 'TIpoTransporte_idTIpoTransporte' => $model->TIpoTransporte_idTIpoTransporte, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH], [
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
            'idTransporte',
            'Matricula',
            'TIpoTransporte_idTIpoTransporte',
            'RRHH_idRRHH',
            'tiporrhh_idTipoRRHH',
            'loadlimit',
        ],
    ]) ?>

</div>

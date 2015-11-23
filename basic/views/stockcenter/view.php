<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Stockcenter */

$this->title = $model->idStockCenter;
$this->params['breadcrumbs'][] = ['label' => 'Stockcenters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stockcenter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idStockCenter' => $model->idStockCenter, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idStockCenter' => $model->idStockCenter, 'RRHH_idRRHH' => $model->RRHH_idRRHH, 'tiporrhh_idTipoRRHH' => $model->tiporrhh_idTipoRRHH], [
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
            'idStockCenter',
            'CantEstantes',
            'RRHH_idRRHH',
            'tiporrhh_idTipoRRHH',
        ],
    ]) ?>

</div>

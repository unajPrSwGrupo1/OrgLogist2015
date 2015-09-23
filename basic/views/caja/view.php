<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */

$this->title = $model->idCaja;
$this->params['breadcrumbs'][] = ['label' => 'Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCaja' => $model->idCaja, 'TipoCaja_idTipoCaja' => $model->TipoCaja_idTipoCaja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCaja' => $model->idCaja, 'TipoCaja_idTipoCaja' => $model->TipoCaja_idTipoCaja], [
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
            'idCaja',
            'Peso',
            'Volumen',
            'TipoCaja_idTipoCaja',
        ],
    ]) ?>

</div>

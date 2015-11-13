<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recepcion */

$this->title = $model->idRecepcion;
$this->params['breadcrumbs'][] = ['label' => 'Recepcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recepcion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idRecepcion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idRecepcion], [
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
            'idRecepcion',
            'idFactura',
            'idCaja',
            'cantidad_esperada',
            'cantidad_recibida',
            'idEstante',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */

$this->title = $model->num_picking;
$this->params['breadcrumbs'][] = ['label' => 'Pickings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="picking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->num_picking], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->num_picking], [
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
            'num_picking',
            'idCaja',
            'idPedido',
            'cantidad_pedida',
            'cantidad_pickeada',
            'idEstante',
            'idStageArea',
        ],
    ]) ?>

</div>

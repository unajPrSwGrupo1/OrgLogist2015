<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estanteestado */

$this->title = $model->idEstanteEstado;
$this->params['breadcrumbs'][] = ['label' => 'Estanteestados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estanteestado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idEstanteEstado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idEstanteEstado], [
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
            'idEstanteEstado',
            'Estado',
        ],
    ]) ?>

</div>

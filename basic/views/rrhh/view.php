<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rrhh */

$this->title = $model->idRRHH;
$this->params['breadcrumbs'][] = ['label' => 'Rrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rrhh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idRRHH' => $model->idRRHH, 'TipoRRHH_idTipoRRHH' => $model->TipoRRHH_idTipoRRHH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idRRHH' => $model->idRRHH, 'TipoRRHH_idTipoRRHH' => $model->TipoRRHH_idTipoRRHH], [
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
            'idRRHH',
            'Nombre',
            'Apellido',
            'Edad',
            'Salario',
            'Jefe',
            'TipoRRHH_idTipoRRHH',
        ],
    ]) ?>

</div>

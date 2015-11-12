<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Estante */

$this->title = $model->idEstante;
$this->params['breadcrumbs'][] = ['label' => 'Estantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estante-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idEstante' => $model->idEstante, 'EstanteEstado_idEstanteEstado' => $model->EstanteEstado_idEstanteEstado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idEstante' => $model->idEstante, 'EstanteEstado_idEstanteEstado' => $model->EstanteEstado_idEstanteEstado], [
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
            'idEstante',
            'Fila',
            'Columna',
            'EstanteEstado_idEstanteEstado',
            'loadlimit',
        ],
    ]) ?>

</div>

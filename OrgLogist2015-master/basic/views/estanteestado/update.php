<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estanteestado */

$this->title = 'Update Estanteestado: ' . ' ' . $model->idEstanteEstado;
$this->params['breadcrumbs'][] = ['label' => 'Estanteestados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEstanteEstado, 'url' => ['view', 'id' => $model->idEstanteEstado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estanteestado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

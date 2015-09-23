<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estante */

$this->title = 'Update Estante: ' . ' ' . $model->idEstante;
$this->params['breadcrumbs'][] = ['label' => 'Estantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEstante, 'url' => ['view', 'idEstante' => $model->idEstante, 'EstanteEstado_idEstanteEstado' => $model->EstanteEstado_idEstanteEstado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

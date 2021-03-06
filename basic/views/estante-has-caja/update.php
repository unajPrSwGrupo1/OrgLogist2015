<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstanteHasCaja */

$this->title = 'Update Estante Has Caja: ' . ' ' . $model->Estante_idEstante;
$this->params['breadcrumbs'][] = ['label' => 'Estante Has Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Estante_idEstante, 'url' => ['view', 'Estante_idEstante' => $model->Estante_idEstante, 'Caja_idCaja' => $model->Caja_idCaja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estante-has-caja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

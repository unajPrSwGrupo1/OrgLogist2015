<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rrhh */

$this->title = 'Update Rrhh: ' . ' ' . $model->idRRHH;
$this->params['breadcrumbs'][] = ['label' => 'Rrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRRHH, 'url' => ['view', 'idRRHH' => $model->idRRHH, 'TipoRRHH_idTipoRRHH' => $model->TipoRRHH_idTipoRRHH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rrhh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

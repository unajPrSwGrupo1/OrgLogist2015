<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Darsenaestado */

$this->title = 'Update Darsenaestado: ' . ' ' . $model->idDarsenaEstado;
$this->params['breadcrumbs'][] = ['label' => 'Darsenaestados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDarsenaEstado, 'url' => ['view', 'id' => $model->idDarsenaEstado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="darsenaestado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

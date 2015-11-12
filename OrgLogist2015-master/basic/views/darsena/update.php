<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Darsena */

$this->title = 'Update Darsena: ' . ' ' . $model->idDarsena;
$this->params['breadcrumbs'][] = ['label' => 'Darsenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDarsena, 'url' => ['view', 'idDarsena' => $model->idDarsena, 'DarsenaEstado_idDarsenaEstado' => $model->DarsenaEstado_idDarsenaEstado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="darsena-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

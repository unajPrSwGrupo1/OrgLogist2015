<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocaja */

$this->title = 'Update Tipocaja: ' . ' ' . $model->idTipoCaja;
$this->params['breadcrumbs'][] = ['label' => 'Tipocajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoCaja, 'url' => ['view', 'id' => $model->idTipoCaja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipocaja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

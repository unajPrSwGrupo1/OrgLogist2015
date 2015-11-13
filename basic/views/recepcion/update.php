<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recepcion */

$this->title = 'Update Recepcion: ' . ' ' . $model->idRecepcion;
$this->params['breadcrumbs'][] = ['label' => 'Recepcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idRecepcion, 'url' => ['view', 'id' => $model->idRecepcion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recepcion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

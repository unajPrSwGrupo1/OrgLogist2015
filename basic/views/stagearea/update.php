<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Stagearea */

$this->title = 'Update Stagearea: ' . ' ' . $model->idStageArea;
$this->params['breadcrumbs'][] = ['label' => 'Stageareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idStageArea, 'url' => ['view', 'idStageArea' => $model->idStageArea, 'TipoStageArea_idTipoStageArea' => $model->TipoStageArea_idTipoStageArea]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stagearea-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

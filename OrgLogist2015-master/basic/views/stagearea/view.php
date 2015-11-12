<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Stagearea */

$this->title = $model->idStageArea;
$this->params['breadcrumbs'][] = ['label' => 'Stageareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stagearea-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idStageArea' => $model->idStageArea, 'TipoStageArea_idTipoStageArea' => $model->TipoStageArea_idTipoStageArea], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idStageArea' => $model->idStageArea, 'TipoStageArea_idTipoStageArea' => $model->TipoStageArea_idTipoStageArea], [
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
            'idStageArea',
            'TipoStageArea_idTipoStageArea',
            'loadlimit',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tiporrhh */

$this->title = $model->idTipoRRHH;
$this->params['breadcrumbs'][] = ['label' => 'Tiporrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiporrhh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idTipoRRHH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idTipoRRHH], [
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
            'idTipoRRHH',
            'Tipo',
            'descript',
        ],
    ]) ?>

</div>

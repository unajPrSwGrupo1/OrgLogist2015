<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FuncTiporrhh */

$this->title = $model->idFunc;
$this->params['breadcrumbs'][] = ['label' => 'Func Tiporrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="func-tiporrhh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idFunc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idFunc], [
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
            'idFunc',
            'link_func',
            'desc_func',
            'tiporrhh_idTipoRRHH',
        ],
    ]) ?>

</div>

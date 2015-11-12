<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tipocaja */

$this->title = $model->idTipoCaja;
$this->params['breadcrumbs'][] = ['label' => 'Tipocajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipocaja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idTipoCaja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idTipoCaja], [
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
            'idTipoCaja',
            'Tipo',
        ],
    ]) ?>

</div>

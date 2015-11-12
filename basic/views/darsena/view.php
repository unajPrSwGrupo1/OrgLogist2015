<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Darsena */

$this->title = $model->idDarsena;
$this->params['breadcrumbs'][] = ['label' => 'Darsenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darsena-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idDarsena' => $model->idDarsena, 'DarsenaEstado_idDarsenaEstado' => $model->DarsenaEstado_idDarsenaEstado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idDarsena' => $model->idDarsena, 'DarsenaEstado_idDarsenaEstado' => $model->DarsenaEstado_idDarsenaEstado], [
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
            'idDarsena',
            'Nombre',
            'Descripcion',
            'DarsenaEstado_idDarsenaEstado',
        ],
    ]) ?>

</div>

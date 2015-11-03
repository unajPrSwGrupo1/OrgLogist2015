<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pallet */

$this->title = $model->idPallet;
$this->params['breadcrumbs'][] = ['label' => 'Pallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pallet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPallet], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPallet], [
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
            'idPallet',
            'cantCajas',
            'physic',
        ],
    ]) ?>

</div>

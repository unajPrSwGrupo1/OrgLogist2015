<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PalletHasCaja */

$this->title = $model->Pallet_idPallet;
$this->params['breadcrumbs'][] = ['label' => 'Pallet Has Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pallet-has-caja-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Pallet_idPallet' => $model->Pallet_idPallet, 'Caja_idCaja' => $model->Caja_idCaja], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Pallet_idPallet' => $model->Pallet_idPallet, 'Caja_idCaja' => $model->Caja_idCaja], [
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
            'Pallet_idPallet',
            'Caja_idCaja',
            'descript',
        ],
    ]) ?>

</div>

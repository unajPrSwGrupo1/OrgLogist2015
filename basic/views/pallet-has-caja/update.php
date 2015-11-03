<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PalletHasCaja */

$this->title = 'Update Pallet Has Caja: ' . ' ' . $model->Pallet_idPallet;
$this->params['breadcrumbs'][] = ['label' => 'Pallet Has Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Pallet_idPallet, 'url' => ['view', 'Pallet_idPallet' => $model->Pallet_idPallet, 'Caja_idCaja' => $model->Caja_idCaja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pallet-has-caja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

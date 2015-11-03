<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pallet */

$this->title = 'Update Pallet: ' . ' ' . $model->idPallet;
$this->params['breadcrumbs'][] = ['label' => 'Pallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPallet, 'url' => ['view', 'id' => $model->idPallet]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pallet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

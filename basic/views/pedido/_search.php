<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPedido') ?>

    <?= $form->field($model, 'cantCajas') ?>

    <?= $form->field($model, 'cantPallets') ?>

    <?= $form->field($model, 'RRHH_idRRHH') ?>

    <?= $form->field($model, 'tiporrhh_idTipoRRHH') ?>

    <?php // echo $form->field($model, 'Cliente_idCliente') ?>

    <?php // echo $form->field($model, 'Fecha') ?>

    <?php // echo $form->field($model, 'Hora') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

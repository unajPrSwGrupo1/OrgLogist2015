<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTicket') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'MotivoTicket_idMotivoTicket') ?>

    <?= $form->field($model, 'RRHH_idRRHH') ?>

    <?= $form->field($model, 'RRHH_TipoRRHH_idTipoRRHH') ?>

    <?php // echo $form->field($model, 'Transporte_idTransporte') ?>

    <?php // echo $form->field($model, 'Transporte_TIpoTransporte_idTIpoTransporte') ?>

    <?php // echo $form->field($model, 'Transporte_RRHH_idRRHH') ?>

    <?php // echo $form->field($model, 'Transporte_RRHH_TipoRRHH_idTipoRRHH') ?>

    <?php // echo $form->field($model, 'Fecha') ?>

    <?php // echo $form->field($model, 'Hora') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

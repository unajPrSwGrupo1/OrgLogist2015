<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MotivoTicket_idMotivoTicket')->textInput() ?>

    <?= $form->field($model, 'RRHH_idRRHH')->textInput() ?>

    <?= $form->field($model, 'RRHH_TipoRRHH_idTipoRRHH')->textInput() ?>

    <?= $form->field($model, 'Transporte_idTransporte')->textInput() ?>

    <?= $form->field($model, 'Transporte_TIpoTransporte_idTIpoTransporte')->textInput() ?>

    <?= $form->field($model, 'Transporte_RRHH_idRRHH')->textInput() ?>

    <?= $form->field($model, 'Transporte_RRHH_TipoRRHH_idTipoRRHH')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Hora')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

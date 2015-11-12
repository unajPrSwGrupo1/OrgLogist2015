<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Factura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RRHH_idRRHH')->textInput() ?>

    <?= $form->field($model, 'tiporrhh_idTipoRRHH')->textInput() ?>

    <?= $form->field($model, 'Cliente_idCliente')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Hora')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

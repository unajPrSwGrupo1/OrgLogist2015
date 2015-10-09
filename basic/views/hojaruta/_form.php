<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hojaruta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hojaruta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Destino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantCajas')->textInput() ?>

    <?= $form->field($model, 'cantPallets')->textInput() ?>

    <?= $form->field($model, 'Transporte_idTransporte')->textInput() ?>

    <?= $form->field($model, 'Transporte_TIpoTransporte_idTIpoTransporte')->textInput() ?>

    <?= $form->field($model, 'Transporte_RRHH_idRRHH')->textInput() ?>

    <?= $form->field($model, 'Transporte_tiporrhh_idTipoRRHH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

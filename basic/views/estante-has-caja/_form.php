<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstanteHasCaja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estante-has-caja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Estante_idEstante')->textInput() ?>

    <?= $form->field($model, 'Estante_EstanteEstado_idEstanteEstado')->textInput() ?>

    <?= $form->field($model, 'Caja_idCaja')->textInput() ?>

    <?= $form->field($model, 'Caja_TipoCaja_idTipoCaja')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

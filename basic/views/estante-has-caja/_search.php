<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstanteHasCajaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estante-has-caja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Estante_idEstante') ?>

    <?= $form->field($model, 'Estante_EstanteEstado_idEstanteEstado') ?>

    <?= $form->field($model, 'Caja_idCaja') ?>

    <?= $form->field($model, 'Caja_TipoCaja_idTipoCaja') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

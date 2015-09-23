<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CajaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="caja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCaja') ?>

    <?= $form->field($model, 'Peso') ?>

    <?= $form->field($model, 'Volumen') ?>

    <?= $form->field($model, 'TipoCaja_idTipoCaja') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

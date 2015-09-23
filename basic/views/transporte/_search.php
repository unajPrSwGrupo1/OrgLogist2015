<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransporteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transporte-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idTransporte') ?>

    <?= $form->field($model, 'Matricula') ?>

    <?= $form->field($model, 'Peso') ?>

    <?= $form->field($model, 'TIpoTransporte_idTIpoTransporte') ?>

    <?= $form->field($model, 'RRHH_idRRHH') ?>

    <?php // echo $form->field($model, 'RRHH_TipoRRHH_idTipoRRHH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

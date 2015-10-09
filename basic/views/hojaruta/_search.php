<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HojarutaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hojaruta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idHojaRuta') ?>

    <?= $form->field($model, 'Destino') ?>

    <?= $form->field($model, 'cantCajas') ?>

    <?= $form->field($model, 'cantPallets') ?>

    <?= $form->field($model, 'Transporte_idTransporte') ?>

    <?php // echo $form->field($model, 'Transporte_TIpoTransporte_idTIpoTransporte') ?>

    <?php // echo $form->field($model, 'Transporte_RRHH_idRRHH') ?>

    <?php // echo $form->field($model, 'Transporte_tiporrhh_idTipoRRHH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

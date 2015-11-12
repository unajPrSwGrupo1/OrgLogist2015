<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecepcionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recepcion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idRecepcion') ?>

    <?= $form->field($model, 'idFactura') ?>

    <?= $form->field($model, 'idCaja') ?>

    <?= $form->field($model, 'cantidad_esperada') ?>

    <?= $form->field($model, 'cantidad_recibida') ?>

    <?php // echo $form->field($model, 'idEstante') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

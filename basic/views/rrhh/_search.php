<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RrhhSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rrhh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idRRHH') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Apellido') ?>

    <?= $form->field($model, 'Edad') ?>

    <?= $form->field($model, 'Salario') ?>

    <?php // echo $form->field($model, 'Jefe') ?>

    <?php // echo $form->field($model, 'TipoRRHH_idTipoRRHH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

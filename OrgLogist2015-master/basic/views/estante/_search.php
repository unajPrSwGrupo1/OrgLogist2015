<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstanteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idEstante') ?>

    <?= $form->field($model, 'Fila') ?>

    <?= $form->field($model, 'Columna') ?>

    <?= $form->field($model, 'EstanteEstado_idEstanteEstado') ?>

    <?= $form->field($model, 'loadlimit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

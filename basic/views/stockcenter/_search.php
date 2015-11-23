<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StockcenterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stockcenter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idStockCenter') ?>

    <?= $form->field($model, 'CantEstantes') ?>

    <?= $form->field($model, 'RRHH_idRRHH') ?>

    <?= $form->field($model, 'tiporrhh_idTipoRRHH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PickingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'num_picking') ?>

    <?= $form->field($model, 'idCaja') ?>

    <?= $form->field($model, 'idPedido') ?>

    <?= $form->field($model, 'cantidad_pedida') ?>

    <?= $form->field($model, 'cantidad_pickeada') ?>

    <?php // echo $form->field($model, 'idEstante') ?>

    <?php // echo $form->field($model, 'idStageArea') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

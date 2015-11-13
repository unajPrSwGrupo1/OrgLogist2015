<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recepcion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recepcion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idRecepcion')->textInput() ?>

    <?= $form->field($model, 'idFactura')->textInput() ?>

    <?= $form->field($model, 'idCaja')->textInput() ?>

    <?= $form->field($model, 'cantidad_esperada')->textInput() ?>

    <?= $form->field($model, 'cantidad_recibida')->textInput() ?>

    <?= $form->field($model, 'idEstante')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rrhh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rrhh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Edad')->textInput() ?>

    <?= $form->field($model, 'Salario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jefe')->textInput() ?>

    <?= $form->field($model, 'TipoRRHH_idTipoRRHH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

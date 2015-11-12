<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Authkey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RRHH_idRRHH')->textInput() ?>

    <?= $form->field($model, 'tiporrhh_idTipoRRHH')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Hora')->textInput() ?>

    <?= $form->field($model, 'activate')->dropDownList(['1' => 'Activo', '0' => 'Desactivado']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

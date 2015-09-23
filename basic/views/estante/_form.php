<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fila')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Columna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EstanteEstado_idEstanteEstado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

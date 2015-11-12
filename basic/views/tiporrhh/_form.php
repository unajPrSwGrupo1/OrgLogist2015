<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tiporrhh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tiporrhh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descript')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PalletHasCaja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pallet-has-caja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Pallet_idPallet')->textInput() ?>

    <?= $form->field($model, 'Caja_idCaja')->textInput() ?>

    <?= $form->field($model, 'descript')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Loadlimit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loadlimit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'large')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'tall')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'longUnit')->dropDownList([ 'mm' => 'Mm', 'cm' => 'Cm', 'dm' => 'Dm', 'm' => 'M', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'weightUnt')->dropDownList([ 'mg' => 'Mg', 'g' => 'G', 'kg' => 'Kg', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'descript')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

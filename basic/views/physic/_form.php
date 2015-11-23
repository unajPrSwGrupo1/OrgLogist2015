<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Physic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="physic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'large')->textInput() ?>

    <?= $form->field($model, 'tall')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'maxWeight')->textInput() ?>

    <?= $form->field($model, 'longUnit')->dropDownList([ 'mm' => 'Mm', 'cm' => 'Cm', 'm' => 'M', 'hm' => 'Hm', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'weightUnit')->dropDownList([ 'mg' => 'Mg', 'g' => 'G', 'Kg' => 'Kg', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

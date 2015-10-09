<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FuncTiporrhh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="func-tiporrhh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'link_func')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc_func')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tiporrhh_idTipoRRHH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

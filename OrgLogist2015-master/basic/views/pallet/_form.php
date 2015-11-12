<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pallet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cantCajas')->textInput() ?>

    <?= $form->field($model, 'physic')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

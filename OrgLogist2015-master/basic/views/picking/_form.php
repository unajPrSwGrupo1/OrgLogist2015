<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="picking-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num_picking')->textInput() ?>

    <?= $form->field($model, 'idCaja')->textInput() ?>

    <?= $form->field($model, 'idPedido')->textInput() ?>

    <?= $form->field($model, 'cantidad_pedida')->textInput() ?>

    <?= $form->field($model, 'cantidad_pickeada')->textInput() ?>

    <?= $form->field($model, 'idEstante')->textInput() ?>

    <?= $form->field($model, 'idStageArea')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

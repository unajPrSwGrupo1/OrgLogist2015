<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FuncTiporrhhSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="func-tiporrhh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idFunc') ?>

    <?= $form->field($model, 'link_func') ?>

    <?= $form->field($model, 'desc_func') ?>

    <?= $form->field($model, 'tiporrhh_idTipoRRHH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

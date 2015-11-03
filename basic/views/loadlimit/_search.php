<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoadlimitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loadlimit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'large') ?>

    <?= $form->field($model, 'width') ?>

    <?= $form->field($model, 'tall') ?>

    <?= $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'longUnit') ?>

    <?php // echo $form->field($model, 'weightUnt') ?>

    <?php // echo $form->field($model, 'descript') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DarsenaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="darsena-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDarsena') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'DarsenaEstado_idDarsenaEstado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\FuncTiporrhh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="func-tiporrhh-form">

    <?php $form = ActiveForm::begin(); $model->loadDefaultValues();?>

    <?= $form->field($model, 'link_func')->textInput(['maxlength' => true, 'value' => $model->link_func])  ?>

    <?= $form->field($model, 'desc_func')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tiporrhh_idTipoRRHH')
	->dropDownList(
		ArrayHelper::map($subModelTiporrhh->getAllTiporrhh(), 'idTipoRRHH', 'descript')
		)
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

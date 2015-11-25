<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Rrhh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rrhh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Edad')->textInput() ?>

    <?= $form->field($model, 'Salario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Jefe')
	->dropDownList(
		ArrayHelper::map($model->getAllRrhh(), 'idRRHH', 'descript')
		)
	?>


    <?= $form->field($model, 'activate')->dropDownList(['1' => 'Activo', '0' => 'Desactivado']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Nuevo' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

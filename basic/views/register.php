<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<h3><?= $msg ?></h3>
<h1>Register</h1>

<div class="register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, "username")->input("text") ?>

    <?= $form->field($model, "Mail")->input("email") ?>

    <?= $form->field($model, "password")->input("password") ?>

    <?= $form->field($model, "password_repeat")->input("password") ?>

    <?= $form->field($model, 'RRHH_idRRHH')
	->dropDownList(
		ArrayHelper::map($subModelRrhh->getAllRrhh(), 'idRRHH', 'descript')
		)
	?>


    <?=$form->field($model, 'tiporrhh_idTipoRRHH')
	->dropDownList(
		ArrayHelper::map($subModelTiporrhh->getAllTiporrhh(), 'idTipoRRHH', 'descript')
		)
	?>


<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>
<?php ActiveForm::end(); ?>
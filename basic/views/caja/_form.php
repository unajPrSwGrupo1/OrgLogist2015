<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */
?>

<div class="caja-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?=$form->field($model, 'TipoCaja_idTipoCaja')
     ->dropDownList(
            ArrayHelper::map($subModelTipo->getAllTipocaja(), 'idTipoCaja', 'Tipo')
            )
    ?>
    
    <?=$form->field($model, 'physic')
     ->dropDownList(
            ArrayHelper::map($subModelPhy->getAllPhy(), 'id', 'descript')
            )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

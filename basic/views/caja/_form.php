<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Caja */
?>

<div class="caja-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?=$form->field($model, 'TipoCaja_idTipoCaja')//este es el valor del campo con foreingkeys en tabla caja
     ->dropDownList(//cambiado por un combobox
            ArrayHelper::map($subModelTipo->getAllTipocaja(), 'idTipoCaja', 'Tipo')//los items de la lista del dropdownlist son tomados de estos campos
            )//subModelTipo en el controlador se define que en caja voy usar el modelo de tipo caja tambien
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

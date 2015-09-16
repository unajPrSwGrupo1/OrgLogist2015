<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>


<div class="container-fluid" >
     <h1>Gestión de Usuarios</h1>
</div>

<?= Html::beginForm(
        Url::toRoute("site/request"),//action  aca va la action despues del boton
        "get",//method
        ['class' => 'form-horizontal']//options
        );
?>


<div class="form-group">
    <?= Html::label("Nombre: ", "lblnombre") ?>
    <?= Html::textInput("txtnombre", null, ["class" => "form-control"]) ?>
   
</div>
<div class="form-group">
    <?= Html::label("Apellido: ", "lblapellido") ?>
    <?= Html::textInput("nombre", null, ["class" => "form-control"]) ?>
</div>
<div class="form-group">
    <?= Html::label("Documento: ", "lbldocumento") ?>
    <?= Html::textInput("txtdocumento", null, ["class" => "form-control"]) ?>
</div>
<div class="form-group">
    <?= Html::label("Fecha de Nac: ", "lblfecnac") ?>
    <?= Html::input("date", "txtfecnac", null, ["class" => "form-control"]) ?>
</div>
<div class="form-group">
    <?= Html::label("Categoria: ", "lblcategoria") ?>
    <?= Html::dropDownList("lista", null, $lista_tipo = ["Administrativo de Transporte","Administrativo de Stock","Operario Calificado","Administrador de Sistema"], ["class" => "form-control"]) ?>
</div>
<div class="form-group">
    <?= Html::label("Usuario: ", "lblusuario") ?>
    <?= Html::textInput("usuario", null, ["class" => "form-control"]) ?>
</div>
<div class="form-group">
    <?= Html::label("Contraseña: ", "lblcontraseña") ?>
    <?= Html::passwordInput("contraseña", null, ["class" => "form-control"]) ?>
</div>



<div class="col-md-1"><?= Html::submitInput("Guardar", ["class" => "btn btn-primary"]) ?></div>
<div class="col-md-1"><?= Html::submitInput("Cancelar", ["class" => "btn btn-primary"]) ?></div>
<div class="col-md-1"><?= Html::submitInput("Modificar", ["class" => "btn btn-primary"]) ?></div>
<div class="col-md-1"><?= Html::submitInput("Eliminar", ["class" => "btn btn-primary"]) ?> </div>


<?=Html::endForm() ?>

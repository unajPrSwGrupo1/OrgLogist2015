<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<html>
<head>
<title>Logeo de Usuario</title>
</head>
<body style="background-image: url(imagenes/FondoLogin.png)"  > 
    <div>
        <?php
$form1 = ActiveForm::begin ( [ 
		'method' => "post",
		"id" => "login",
		"enableClientValidation" => false,
		"enableAjaxValidation" => true 
] );
?>   
    </div>
    <div>
   
    </div>
    <div class="container container-fluid">
        <div class="row vertical-center-row">
            <div class="text-center col-md-4 col-md-offset-4">      
                <div class="form">
                    <div class="header">
                    <h2>Iniciar Sesi&oacuten</h2>
                    </div>
                    <div class="login">
                         
                            
                    <?= $form1->field($model, "username")->input("text")->label('Usuario') ?>
                    <?= $form1->field($model, "password")->input("password")->label('Contraseña') ?> 
                    <?= Html::submitButton("Iniciar",  ["class" =>"btn btn-primary btn-block"])?>
                        <div>
        
        
                        </div>
                    <?= $form1 -> field($model,'rememberMe')->checkbox(['value'=>true])//->label('Recuérdame');?> 
                    <a href="#">Olvid&oacute Su Contrase&ntilde;a?</a> 
                    <?php $form1->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>



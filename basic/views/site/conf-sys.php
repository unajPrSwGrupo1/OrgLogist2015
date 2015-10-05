<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>

<style type="text/css">
    body {background-image:url('http://localhost/basic/imagenes/6.jpg');
	font-family: Gill Sans, Verdana;
font-size: 14px;
line-height: 17px;
text-transform: uppercase;
letter-spacing: 2px;
font-weight: bold;

	}
	
</style>

<html>
<h3>Bienvenido <?= $msg ?></h3>

  <body>
	  
  
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-5 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="http://localhost/basic/web/index.php?r=tiporrhh"style="color:#000000;">Tabla tiporrhh</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=user"style="color:#000000;">Tabla user</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=rrhh/index" style="color:#000000;">Tabla rrhh</a></li>
			</ul>
                
             </div>    
        </div>
		</div>
    </body>
</html>
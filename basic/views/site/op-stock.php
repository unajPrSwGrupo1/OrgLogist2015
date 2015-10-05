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
            <!--li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li-->
			
            <li><a href="" style="color:#000000;" >Consultas de Stock</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=rrhh/index" style="color:#000000;">Mantenimiento de Usuarios</a></li>
			<li><a href="http://localhost/basic/web/index.php?r=cliente/index"style="color:#000000;">Mantenimiento de Clientes</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=transporte/index" style="color:#000000;">Mantenimiento de Transportes</a></li>
            <li><a href=""style="color:#000000;">Administracion de Pedidos</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=factura/index" style="color:#000000;">Administracion de Recepciones</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=caja/index" style="color:#000000;">Mantenimiento de Items</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=caja/index" style="color:#000000;">Mantenimiento de Darsenas</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=stagearea/index" style="color:#000000;">Mantenimiento de Stage Areas</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=estante/index" style="color:#000000;">Mantenimiento de Ubicaciones</a></li>
			<li><a href="http://localhost/basic/web/index.php?r=hojaruta/index"style="color:#000000;" >Mantenimiento de Hojas de Ruta</a></li>
			<li><a href="" style="color:#000000;">Mantenimiento de Pallet</a></li>
            <li><a href="" style="color:#000000;">Reportes Varios</a></li>
            <li><a href="http://localhost/basic/web/index.php?r=ticket/index"style="color:#000000;">Mantenimiento de Tickets</a></li>
            </ul>
                
             </div>    
        </div>
		</div>
    </body>
</html>
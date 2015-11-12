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
          	<?php 
				foreach($arr as $key=>$link) {
					echo("<li><a href=\"".$urlhead.$link['link_func']."\"style=\"color:#000000;\">".$link['desc_func']."</a></li>\n");
				}		
			?>
            </ul>
          </div>    
        </div>
		</div>
    </body>
</html>
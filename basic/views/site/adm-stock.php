<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>



<html>
<h3>Bienvenido<?= $msg ?></h3>

  <body style="background-image: url(imagenes/6.jpg)">
	  
  
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-5 sidebar" style="font-family: Comic Sans MS" style="font-weight: bold">
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
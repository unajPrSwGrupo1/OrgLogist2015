<?php
/* @var $this yii\web\View */
$this->title = 'S.A.L';
?>
<style type="text/css">
body {
	background-image: url('http://localhost/basic/imagenes/1.jpg');
}
</style>
<div class="site-index">

	<div class="jumbotron">
			<h1>
			Bienvenidos a S.A.L
<!-- 				<PRE> -->
					<?php
// 					print (app\models\SALModel\Intranet::getUrlHead());
// 					?>
<!-- 				</PRE> -->
			</h1>
			<p class="lead">
			System Administration for Logistics
			</p>
	</div>

	<div>
		<div class="col-sm-3 col-md-12 sidebar">
			<p>
				<a class="btn btn-lg btn-primary btn-block"
					href="<?php app\commands\Intranet::getUrlHead();
					?>/basic/web/index.php?r=site%2Flogin">Entrar</a>
			</p>
		</div>
	</div>

</div>


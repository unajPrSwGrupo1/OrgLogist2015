<?php
/* @var $this yii\web\View */
$this->title = 'Logistica Xtreme';
/*“La buena publicidad no se limita a hacer circular información. Penetra la mente del público con deseos y con creencias (Leo Burnett)*/
?>
<body>
    
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
            <!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="imagenes/9.jpg" alt="Servicio" width="850" height="600"  >
    <div class="carousel-caption">
        <section class="main row">
            <aside class ="color2 col-xs-12 col-sm-6 col-md-3 col-md-offset-10">
        <h2 class="text-primary">Nuestra Empresa</h2>
            <p class = "text-muted">Es una compañía de servicios que pone foco en el análisis de todos los aspectos de las necesidades logísticas de sus clientes, para formular y gestionar propuestas innovadoras que aporten soluciones flexibles e integrales.</p>
            </aside>
        </section>
    </div>
    </div>

<div class="item">
    <img src="imagenes/3.jpg" alt="Seguridad" width="850" height="600" >
<div class="carousel-caption">
    <section class="main row">
        <aside class ="color2 col-xs-12 col-sm-6 col-md-3 col-md-offset-10">
            <h2 class="text-primary">Seguridad</h2>
                <p class = "text-muted">Control de Acceso al Sistema según el Tipo de Usuario ,abarcando los procesos completamente desde inicio a fin.
                </p>
        </aside>
    </section>
</div>
</div>
<div class="item">
    <img src="imagenes/7.jpg" alt="Servicio" width="850" height="600" >
<div class="carousel-caption">
    <section class="main row">
        <aside class ="color2 col-xs-12 col-sm-6 col-md-3 col-md-offset-10">
            <h2 class="text-primary">Servicio</h2>
                <p class = "text-muted">Entregas domiciliarias ,Distribución exclusiva y/o consolidada</p>
        </aside>
    </section>
</div>
</div>

<div class="item">
    <img src="imagenes/8.jpg" alt="Stock" width="850" height="600" >
<div class="carousel-caption">
    <section class="main row">
        <aside class ="color2 col-xs-12 col-sm-6 col-md-3 col-md-offset-10">
            <h2 class="text-primary">Gestion de Stock</h2>
                <p class = "text-muted">Tenga el dominio de su stock al alcance de las ultimas tecnologias ,recibiendo notificaciones de transacciones online.</p>
        </aside>
   </section>
</div>
</div>
<!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</div>

</body>

<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
    </script>




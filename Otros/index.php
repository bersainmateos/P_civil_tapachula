<?php 
  require '../conexion/conexion.class.php';
  $Open= new OpenConexion(); //Se Instancia el objeto conexion.
  $seccion = (empty($_GET['nombre'])) ? 1 : $_GET['nombre'];
  $Categoria = json_decode($Open->getCategorias());
  $Nota=json_decode($Open->getAlerta());
  $Video=json_decode($Open->getVideo());
  $Open->Close();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="BERSAIN MATEOS MÉNDEZ">
    <link rel="icon" href="../favicon.ico">
    <title> PROTECCIÓN CIVIL TAPACHULA </title>
    <!-- Hojas de estilo-->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/blog.css" rel="stylesheet">
    <link href="../css/redsocial.css" rel="stylesheet">
  </head>

  <body>

<!--Inicio del header-->
    <nav class="navbar navbar-expand-md navbar-dark" style="background: #621132;">
      <img id="segob" class="" src="../sources/imagenes/logo.png" width="200px" height="55px" style="position: absolute; box-sizing: content-box; left: 4px; top: 0px"> 
      <a class="navbar-brand" href="./"></a>
      <button id="img" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../1"><b>Noticias</b></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#"><b>Videos</b></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./"><b>Conócenos</b></a>
          </li>
        </ul>
      </div>
    </nav>
<!--Fin del header-->

  <div id="line"></div>

<div class="container cuadro">
  <br>
<!--Inicio de los alerta-->
  <?php foreach ($Nota as $value): ?>
    <div class="col-md-12">
        <div class="alert <?='alert-'.$value->{'tipo'}  ?> alert-dismissible fade show">
          <button class="close" data-dismiss="alert">
            <span >&times;</span>
          </button>
          
            <?=$value->{'descripcion_nota'} ?>
          
        </div>
      </div>
  <?php endforeach; ?>
<!--Fin de los alerta-->

  <div class="row">
       <?php if (!empty($Video)): ?>
        <?php foreach ($Video as $getvideo): ?>
        <div class="col-md-6 ">
          <div class="card flex-md-row mb-4 box-shadow h-md-250 video">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary"><?=$getvideo->{'titulo'} ?></strong>
              <div class="mb-1 text-muted"><?= $Open->setformato_fecha($getvideo->{'fecha_subido'}); ?></div>
              <p><?=$getvideo->{'descripcion_video'} ?></p>
            </div>
            <video controls class="embed-responsive" src=".<?=$getvideo->{'ruta_video'} ?>"></video>
          </div>
        </div>
      <?php endforeach; ?>
      <?php endif; ?>
   </div>
<hr>
    <div class="row">   
        <div class="col-md-8">
          <h3 style="color:rgba(0,0,0,.7); font-family: roboto; font-weight: bold;" > <span class="glyphicon glyphicon-bookmark"></span>Misión</h3>
          <p style="text-align: justify; font-family: sans-serif;">
Proteger la vida , el patrimonio y el medio ambiente ante los riesgos de desastres, a través del manejo integral de estos con oportunidad y pertinencia, observando la aplicación de la ley, el respeto a los derechos humanos, la diversidad cultural y la equidad de género, impulsando el desarrollo sustentable.
          </p>
            <br>
            <h3 style="color:rgba(0,0,0,.7); font-family: roboto; font-weight: bold;"> <span class="glyphicon glyphicon-bookmark"></span> Visión</h3>
            <p style="text-align: justify;">
              Ser una institución que promueva y coordine el establecimiento de políticas y acciones destinadas al manejo integral de riesgos de desastres con una alta participación ciudadana y de instancias de los diversos ordenes de gobierno, además  de la colaboración científica y de universidades, haciendo uso de los recursos materiales, humanos y tecnológicos necesarios para actuar siempre de manera anticipada, eficiente y oportuna.
            </p>
            <br>
            <h3 style="color:rgba(0,0,0,.7); font-family: roboto; font-weight: bold;"> <span class="glyphicon glyphicon-bookmark"></span> Políticas de Calidad</h3>
            <p style="text-align: justify;">
              Implementar las normas, políticas y procedimientos que permitan operar con eficacia y eficiencia la estrategia  de la gestión integral de riesgos de desastres  de la Secretaria  de Protección Civil e Instituto  para gestión Integral de Riesgos de Desastres, mediante procesos y servicios sistematizados, apegados al marco jurídico aplicable, y basados en la mejora continua para satisfacer  las necesidades de los ciudadanos, orientada a proteger la vida, el patrimonio y medio ambiente.
            </p>
        </div>
        
<!--Inicio de la barra lateral (Derecha)-->
    <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 rounded">
            <h4 > Acerca de</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>

          <div class="p-3">
            <h2 >Cátegoria</h2>
            <h3 >Año</h3>
            <ol class="list-unstyled mb-0">
              <!--Inicio de las cátegorias-->
              <?php foreach ($Categoria as $value):
                  $year=explode("-", $value->{'fecha_noticia'});
                  $x=$year[0];
                  $year="../1:[".$year[0]."]"; 
                ?>
                    <li><a href="<?php echo $year; ?>"> <?= $x; ?> </a></li>
              <?php endforeach;?>
              <!--Fin de las cátegorias-->
            </ol><br>
            <h3 >Mes</h3>
            <ol class="list-unstyled mb-0">
              <!--Inicio de las cátegorias-->
             <?php $x=date("Y"); ?>
              <li><a href="<?php echo "../1:[{$x}:1]" ?>">Enero</a></li>
              <li><a href="<?php echo "../1:[{$x}:2]" ?>">Febrero</a></li>
              <li><a href="<?php echo "../1:[{$x}:3]" ?>">Marzo</a></li>
              <li><a href="<?php echo "../1:[{$x}:4]" ?>">Abril</a></li>
              <li><a href="<?php echo "../1:[{$x}:5]" ?>">Mayo</a></li>
              <li><a href="<?php echo "../1:[{$x}:6]" ?>">Junio</a></li>
              <li><a href="<?php echo "../1:[{$x}:7]" ?>">Julio</a></li>
              <li><a href="<?php echo "../1:[{$x}:8]" ?>">Agosto</a></li>
              <li><a href="<?php echo "../1:[{$x}:9]" ?>">Septiembre</a></li>
              <li><a href="<?php echo "../1:[{$x}:10]" ?>">Octubre</a></li>
              <li><a href="<?php echo "../1:[{$x}:11]" ?>">Noviembre</a></li>
              <li><a href="<?php echo "../1:[{$x}:12]" ?>">Diciembre</a></li>
              <!--Fin de las cátegorias-->
            </ol>
          </div>
<!--
          <div class="p-3">
            <h4 >Vídeos</h4>
            <ol class="list-unstyled">
              <li><a href="#">Chiapas</a></li>
              <li><a href="#">Coronavirus</a></li>
              <li><a href="#">Enfermedades</a></li>
            </ol>
          </div> -->
          <center><label> <span class="glyphicon glyphicon-map-marker"></span> Google Maps</label></center>
         <!--Google maps-->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7710.98674503172!2d-92.2663708441134!3d14.909581335247228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s!2sParque%20Central%20Miguel%20Hidalgo!5e0!3m2!1ses!2smx!4v1587464805090!5m2!1ses!2smx" width="330" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          <!--Google maps-->
        </aside>
<!--Fin de la barra lateral-->

    </div>

<br>

        <div class="row bg-dark" style="color: #fff"> 
            <div class="col-md-6" style="font-family: roboto; font-weight: bold;">
                <h4> <center>Cont&aacute;ctanos</center> </h4>                            
                            <address>
                               <p><span> Secretaría de Protección Civil </span></p>
                              <p><img alt='Ubicaci&oacute;n' src='../sources/imagenes/1.png'/>Carr. Emiliano Zapata Km. 1.9 </p>
                              <p><img alt='Ciudad' src='../sources/imagenes/2.png'/>Tapachula, Chiapas. CP: 30650 </p>
                              <p><img alt='Tel&eacute;fono' src='../sources/imagenes/3.png'/>(962) 000 000  , (962) 000 000 </p>
                            </address>    
            </div>
            <div class="col-md-6">
               <br>
               <img  src="../sources/imagenes/icon-footer.png" width="200px" height="58px">
               <br><br>
               <img  src="../sources/imagenes/images.png" width="200px" height="58px">
            </div>
        </div>
<!--Redes sociales-->
<aside id="sticky-social">
    <ul id="redsocial">
        <li><a href="https://www.facebook.com/" class="entypo-facebook" target="_blank"><span>Facebook</span></a></li>
        <li><a href="https://twitter.com/" class="entypo-twitter" target="_blank"><span>Twitter</span></a></li>
       <li><a href="#" class="entypo-gplus" target="_blank"><span>Google+</span></a></li>
        <li><a href="https://www.facebook.com/" class="entypo-instagrem" target="_blank"><span>Instagram</span></a></li>
    </ul>
</aside>
<!--Fin de las redes sociales-->


</div>

  <!-- ================================================== -->
  <script src="../javascript/jquery.min.js"></script>
   <script>

    $("#img").click(function(event) {
        if ($("#segob").attr('class')=="d-none") {
            $("#segob").removeClass("d-none");    
        }else{
          $("#segob").addClass("d-none");
        }
      
    });

</script> 
  <script src="../javascript/bootstrap.js"></script>
  <!-- ================================================== -->

  </body>
</html>
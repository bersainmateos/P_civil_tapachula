<?php 
  require '../conexion/conexion.class.php';
  $Open = new OpenConexion();
  $Noticia = json_decode($Open->getNota($_GET['nombre']));
  $Categoria = json_decode($Open->getCategorias());
  $Galeria = json_decode($Open->getGaleria($_GET['nombre']));
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
    <nav class="navbar navbar-expand-md navbar-dark" style="background: rgba(120,1,9,0.91);">
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
            <a class="nav-link" href="../Otros"><b>Conócenos</b></a>
          </li>
        </ul>
      </div>
    </nav>
<!--Fin del header-->

  <div id="line"></div>
<!--Inicio de los alerta-->
<div class="container cuadro">

    <div class="row">   
        <div class="col-md-8">
          <!--Inicio de las noticias-->
           <article><br>
              <h2 style="color: rgba(120,1,9,0.91);">
                <?= $Noticia->{'titulo_noticia'}; ?>
              </h2><br>
                    <div class="info">
                      <label>
                        <span class="glyphicon glyphicon-time"></span>  
                        <?= $Open->setformato_fecha($Noticia->{'fecha_noticia'}) ?>
                      </label>
                    </div>
                    <p class="excerpt">
                      <img src=".<?= $Noticia->{'img_noticia'} ?>" alt="<?= $Noticia->{'descripcion_img'} ?>" />
                    </p>
  <ul>
    <li style="font-size: 13px; font-style: italic;"> 
      <?= $Noticia->{'descripcion_img'}; ?>
    </li>
  </ul>
      <!--Contenido-->
        <?= $Noticia->{'contenido_noticia'}; ?>
      

      <!--Fin del contenido-->
                </article>

       <hr >
            <br>


<?php if (!empty($Galeria)): ?>
  <h2 style="color: rgba(120,1,9,0.91); margin-left: 10px;" class="font-italic"> 
    <span class="glyphicon glyphicon-picture"></span> 
    GALERIA
  </h2>
<ul class="galeria">
  <?php foreach ($Galeria as $value): ?>
      <li class="galeria__item">
        <img src=".<?= $value->{'ruta_img'}; ?>" class="galeria__img img_ ">
      </li>
    <?php endforeach; ?>
    </ul>
<?php  endif;?>

            
        </div>
        
<!--Inicio de la barra lateral (Derecha)-->
    <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 rounded">
            <h4 class="font-italic">Acerca de</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>

          <div class="p-3">
            <h2 >Cátegoria</h2>
            <h3 >Año</h3>
            <ol class="list-unstyled mb-0">
              <!--Inicio de las cátegorias-->
              <?php 
                $y=explode(".", $Open->setNoticia_fecha($_GET['nombre']));
              foreach ($Categoria as$value):
                  $year=explode("-", $value->{'fecha_noticia'});
                  $x=$year[0];
                  $year="1:[".$year[0]."]";
                ?>
                    <li><a href="../<?php echo $year; ?>"> <?= $x; ?> </a></li>
              <?php endforeach;?>
              <!--Fin de las cátegorias-->
            </ol><br>
            <h3 >Mes</h3>
            <ol class="list-unstyled mb-0">
              <!--Inicio de las cátegorias-->
             
              <li><a href="../<?php echo "1:[".$y[3].":1]" ?>">Enero</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":2]" ?>">Febrero</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":3]" ?>">Marzo</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":4]" ?>">Abril</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":5]" ?>">Mayo</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":6]" ?>">Junio</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":7]" ?>">Julio</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":8]" ?>">Agosto</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":9]" ?>">Septiembre</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":10]" ?>">Octubre</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":11]" ?>">Noviembre</a></li>
              <li><a href="../<?php echo "1:[".$y[3].":12]" ?>">Diciembre</a></li>
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
  <script src="../javascript/bootstrap.js"></script>
   <script>

    $(function() {
       var elements = document.querySelectorAll("p img");
       for(var i = 0; i < elements.length; i++){
           elements[i].classList.add("img-fluid");
       }
    
    });

    $("#img").click(function(event) {
        if ($("#segob").attr('class')=="d-none") {
            $("#segob").removeClass("d-none");    
        }else{
          $("#segob").addClass("d-none");
        }
      
    });
  
  $('.galeria__img').click(function(e){
      var img = e.target.src;
      var modal = '<div class="modal" id="modal"><img src="'+ img + '" class="modal__img"><div class="modal__boton" id="modal__boton">X</div></div>';
      $('body').append(modal);
      $('#modal__boton').click(function(){
        $('#modal').remove();
      })
  });


  $(document).keyup(function(e){
    if (e.which==27) {
     $('#modal').remove();
      }
  })

</script>
  <!-- ================================================== --> 
  </body>
</html>
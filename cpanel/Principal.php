<?php 
  session_start();
  
  if (!isset($_SESSION['session'])) {
    echo "<script>location.href='./'</script>";
  }

  require '../conexion/conexion.class.php';
  $Home = new OpenConexion();
  $url = (isset($_GET['modulo'])) ? $_GET['modulo'] : "Null" ;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proteccion Civil </title>
    <link rel="icon" href="../favicon.ico">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../css/custom.min.css" rel="stylesheet">
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
     <link href="../css/dataTables.bootstrap4.min.css" rel="stylesheet">

  
  </head>

  <body >
   <div class="fixed-top">
  <div class="header ">
    <h1><img id="segob" class="" src="../sources/imagenes/logo.png" width="200px" height="55px" style="position: absolute; box-sizing: content-box; left: 4px; top: 0px"></h1> 
    <div class="optionsBar">
      <span><?php echo $Home->setformato_fecha(date("Y-m-d"))." "; ?>|</span>
      <span class="user"><?=$_SESSION['session']['nombre_usuario']." ".$_SESSION['session']['ape_paterno_usuario']." ".$_SESSION['session']['ape_materno_usuario']; ?></span>      
      <a href="./php/logout.php"><img class="close" src="../sources/iconos/salir.png" alt="Salir del sistema" title="Salir"></a>
    </div>
  </div>
  <nav>
    <ul>
      <li class="Mandar" id="Escritorio"><a href="#"><span class="fa fa-home icon-menu"></span>Inicio</a></li>
      <li class="principal">
        <a href="#"><span class="fa fa-group"></span>Usuarios</a>
        <ul>
          <li class="Mandar" id="Registrar"><a href="#">Nuevo Usuario</a></li>
          <li class="Mandar" id="Lista"><a href="#">Lista de Usuarios</a></li>
        </ul>
      </li>
      <li class="principal">
        <a href="#"><span class="fa fa-file-text"></span>NOTICIAS</a>
        <ul>
          <li class="Mandar" id="Publicar_noticia"><a href="#">Subir Noticia</a></li>
          <li class="Mandar" id="Listar_noticias"><a href="#"> Noticias publicadas</a></li>
        </ul>
      </li>
      <li class="">
        <a href="#"><span class="fa fa-file-text-o"></span>Notas</a>
        <ul>
          <li class="Mandar" id="Subir_nota"><a href="#">Subir Nota</a></li>
          <li class="Mandar" id="Notas_publicadas"><a href="#">Notas publicadas</a></li>
        </ul>
      </li>
      <li class="">
        <a href="#"><span class="fa fa-file-movie-o"></span>Videos</a>
        <ul>
          <li class="Mandar" id="Subir_video"><a href="#">Subir Videos</a></li>
          <li class="Mandar" id="Lista_video"><a href="#">Galeria de videos</a></li>
        </ul>
      </li>

     <li >
        <a href="#"><span class="fa fa-file-image-o"></span>Imagenes</a>
        <ul>
          <li class="Mandar" id="Galeria"><a href="#">Galeria de imagenes</a></li>
          </ul>
      </li>  
      <li>
        <a href="#"><span class="fa fa-file-image-o"></span>Slider</a>
        <ul>
          <li class="Mandar" id="Subir_imagen_slider"><a href="#">Subir Imagen</a></li>
          <li class="Mandar" id="Galeria_slider"><a href="#">Galeria slider</a></li>
          </ul>
      </li>  
    </ul>
  </nav>
</div>
  

<div style="margin-top: 10px;" class="x_panel">
         <?php 
            $Home->View($url);
            $Home->Close();
          ?>
</div>
  
  <script> var url="<?php echo $url; ?>"</script> 
  <script src="../javascript/jquery.min_.js"></script>
  <script src="../javascript/bootstrap.min.js"></script>
  <script src="../javascript/jquery.dataTables.min.js"></script>
  <script src="../javascript/dataTables.bootstrap4.min.js"></script>
  <script src="../javascript/dataTables.fixedHeader.min.js"></script>
  <script src="../javascript/Admin.js" ></script>
  <script src="../javascript/bootstrap-wysiwyg.min.js"></script>
  <script src="../javascript/jquery.hotkeys.js"></script>
  <script src="../javascript/switchery.min.js"></script>
  <script src="../javascript/custom.min.js"></script>

</body>
</html>
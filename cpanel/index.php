<?php 	
  	session_start();
	
	if (isset($_SESSION['session'])) {
		echo "<script>location.href='./Escritorio'</script>";
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Login Admin</title>
		<meta charset="utf8">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/estilo.css">
	</head>
	
	<body>
		<div id="Contenedor">
			<div>
		 		<center>
		 			<img src="../sources/imagenes/chiapas.png">
		 		</center>
		 	</div>
		<div class="ContentForm"> 	
		 	<div class="input-group input-group-lg">				  
				<input type="text" class="form-control"  placeholder="Usuario" id="usuario" aria-describedby="sizing-addon1" required autocomplete="off">
			</div>
			
			<br>
			<div class="input-group input-group-lg">		  
			  <input type="password" id="pass" class="form-control" placeholder="***********" aria-describedby="sizing-addon1" required>
			</div>
			<br>
			<button class="btn btn-block" id="Login" style="background:#6b0f0f;color: white" type="submit">Entrar</button>
			<!--
		<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div> -->		 	
		 <br>
		 </div>
		 </div>
        
		</body>
	<script src="../javascript/jquery.min.js"></script>
	<script src="../javascript/Login.js"></script>
		
</html>
<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			$datos=array(
				"nombre_usuario"=>strip_tags($_POST['nombre']),
				"ape_paterno_usuario"=>strip_tags($_POST['paterno']),
				"ape_materno_usuario"=>strip_tags($_POST['materno']),
				"usuario"=>strip_tags($_POST['usuario']),
				"password"=>strip_tags($_POST['clave'])				
				);

			$guardar = $Login->Conn->prepare("INSERT INTO usuario VALUES(
				default,
				upper(:nombre_usuario),
				upper(:ape_paterno_usuario),
				upper(:ape_materno_usuario),
				:usuario,
				md5(:password)
			)");
			$Login->Close();
			$guardar->execute($datos);

			
				echo "1";
			
		} catch (Exception $e) {
		echo "0".$e->getMessage();
	}	

?>


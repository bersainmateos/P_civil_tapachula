<?php 

	try {
			require "../../../conexion/conexion.class.php";
			$Login = new OpenConexion();
			$datos=array(
				"idusuario"=>strip_tags($_POST['id']),
				"nombre_usuario"=>strip_tags($_POST['nombre']),
				"ape_paterno_usuario"=>strip_tags($_POST['paterno']),
				"ape_materno_usuario"=>strip_tags($_POST['materno']),
				"usuario"=>strip_tags($_POST['usuario']),
				
				
					);
			$guardar = $Login->Conn->prepare("UPDATE usuario set
				nombre_usuario=upper(:nombre_usuario),
				ape_paterno_usuario=upper(:ape_paterno_usuario),
				ape_materno_usuario=upper(:ape_materno_usuario),
				usuario=:usuario WHERE idusuario=:idusuario");
			
			$guardar->execute($datos);

			$Login->Close();
			
			echo "1";
			
		} catch (Exception $e) {
		echo "0";
	}


	

?>


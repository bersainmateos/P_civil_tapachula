<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			$datos=array(
				"idusuario"=>strip_tags($_POST['id']),
				"status_usuario"=>strip_tags($_POST['status_usuario']),
					);
			$Resulset=$Login->Conn->prepare("UPDATE usuario SET status_usuario=:status_usuario WHERE idusuario=:idusuario");
		$Resulset->execute($datos);
		$Login->Close();
		echo "1";
		} catch (Exception $e) {
		echo $e->getMessage();
	}
?>


<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			
			$Listado = $Login->Conn->query("SELECT * FROM usuario ORDER BY idusuario ASC");
			
				echo json_encode($Listado->fetchAll(PDO::FETCH_ASSOC));
			$Login->Close();
		} catch (Exception $e) {
		echo "0";
	}
?>


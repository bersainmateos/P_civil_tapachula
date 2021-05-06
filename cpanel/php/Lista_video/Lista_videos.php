<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			$Listado = $Login->Conn->query("SELECT * FROM video order by idvideo ASC");
			if ($Listado->rowCount() > 0) {
				echo json_encode($Listado->fetchAll(PDO::FETCH_ASSOC));	
			}else{
				echo "0";
			}
		} catch (Exception $e) {
		echo $e->getMessage();
	}	

?>
 
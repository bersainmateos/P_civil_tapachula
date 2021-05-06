<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			$Listado = $Login->Conn->query("SELECT * FROM slider order by idslider");
			if ($Listado->rowCount() > 0) {
				echo json_encode($Listado->fetchAll(PDO::FETCH_ASSOC));	
			}else{
				echo "0";
			}
			$Login->Close();
		} catch (Exception $e) {
		echo "0";
	}	

?>

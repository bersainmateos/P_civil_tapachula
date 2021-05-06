<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			$datos=array(
				"idnota"=>strip_tags((int)$_POST['idnota']),
				"status"=>strip_tags((int)$_POST['status'])
				);

			$guardar = $Login->Conn->prepare("UPDATE nota set status=:status WHERE idnota=:idnota");
			
			$guardar->execute($datos);
			$Login->Close();
			echo "1";
				
			
		} catch (Exception $e) {
		echo "0";
	}	

?>
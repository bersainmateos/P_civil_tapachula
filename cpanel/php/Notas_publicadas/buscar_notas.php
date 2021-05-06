<?php 

	try {
			require "../../../conexion/conexion.class.php";
			$Login = new OpenConexion();
			
			$Listado = $Login->Conn->prepare("SELECT * FROM nota where fecha_subido>= :inicio and fecha_subido <=:fin order by idnota DESC");
			
			$data=array(
				"inicio"=>strip_tags($_POST['inicio']),
				"fin"=>strip_tags($_POST['fin'])
			);
			
			$Listado->execute($data);
			if ($Listado->rowCount() > 0) {
				echo json_encode($Listado->fetchAll(PDO::FETCH_ASSOC));
			}else{
				echo json_encode("0");
			}
			
		} catch (Exception $e) {
		echo json_encode("0");
	}


	

?>
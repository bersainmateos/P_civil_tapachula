<?php 
	
	try {
		require "../../../conexion/conexion.class.php";
		$Des= new OpenConexion();
		
		$id=array(
			"idslider"=>strip_tags((int) $_POST['idslider']),
			"activo"=>strip_tags((int) $_POST['activo'])
		);

		$Resulset=$Des->Conn->prepare("UPDATE slider SET mostrar=:activo WHERE idslider=:idslider");
		$Resulset->execute($id);
		$Des->Close();
		echo "1";
	} catch (Exception $e) {
		echo "0";
	}
?>
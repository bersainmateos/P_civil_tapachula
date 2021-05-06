<?php 
	
	try {
		require "../../../conexion/conexion.class.php";
		$Des= new OpenConexion();
		
		$id=array(
			"id"=>strip_tags((int) $_POST['id']),
			"status"=>strip_tags((int) $_POST['status'])
		);

		$Resulset=$Des->Conn->prepare("UPDATE noticia SET status_noticia=:status WHERE idnoticia=:id");
		$Resulset->execute($id);
		echo "1";
	} catch (Exception $e) {
		echo "0";
	}
?>
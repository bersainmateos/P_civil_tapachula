<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			$Listado = $Login->Conn->query("SELECT galeria.*,noticia.status_noticia FROM galeria INNER JOIN noticia ON galeria.idnoticia=noticia.idnoticia ORDER BY galeria.idfoto ASC");
			if ($Listado->rowCount() > 0) {
				echo json_encode($Listado->fetchAll(PDO::FETCH_ASSOC));	
			}else{
				echo "0";
			}
		} catch (Exception $e) {
		echo $e->getMessage();
	}	

?>

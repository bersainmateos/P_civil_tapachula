<?php 

	try {
		require "../../../conexion/conexion.class.php";
		$Editar=new OpenConexion();

		$data=array("inicio"=>strip_tags($_POST['inicio']),
			"fin"=>strip_tags($_POST['fin'])
		);
	$Base=$Editar->Conn->prepare("select * from noticia where fecha_noticia >= :inicio and fecha_noticia <=:fin order by idnoticia desc");
	$Base->execute($data);

	if ($Base->rowCount() > 0) {
		echo json_encode($Base->fetchAll(PDO::FETCH_ASSOC));
	}else{
		echo "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                	<span aria-hidden=\"true\">×</span>
                </button>
                    <h4>Sin resultados!</h4>
                  </div>";
	}
	$Editar->Close();
	
	} catch (Exception $e) {
		echo "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span>
                    </button>
                    <h4>Ocurrio un error!</h4>
                  </div>";
	}

?>


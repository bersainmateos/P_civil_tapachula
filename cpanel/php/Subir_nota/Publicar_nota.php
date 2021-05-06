<?php 

	try {
			require "../../../conexion/conexion.class.php";
			$Login = new OpenConexion();
			$datos=array(
				"descripcion_nota"=>$_POST['descripcion'],
				"idusuario"=>strip_tags($_POST['idusuario']),
				"color"=>strip_tags($_POST['color'])
				);

			$guardar = $Login->Conn->prepare("INSERT INTO nota VALUES(
				default,
				:descripcion_nota,
				default,
				:idusuario,0,:color)");
			$guardar->execute($datos);
			$Login->Close();

			echo "1";
				
			
		} catch (Exception $e) {
		echo "0";
	}	

?>

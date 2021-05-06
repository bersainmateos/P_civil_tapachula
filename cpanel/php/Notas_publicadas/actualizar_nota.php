<?php 

	try {
			require "../../../conexion/conexion.class.php";
			$Login = new OpenConexion();
			$datos=array(
				"idnota"=>strip_tags((int)$_POST['idnota']),
				"descripcion_nota"=>$_POST['descripcion'],
				"tipo"=>strip_tags($_POST['color'])
			);
			$guardar = $Login->Conn->prepare("UPDATE nota set
				descripcion_nota=:descripcion_nota,
				tipo=:tipo
				 WHERE idnota=:idnota");
				
			$guardar->execute($datos);
			$Login->Close();

			if ($guardar) {
				echo "1";;
			}else {
				echo "0";
			}
		} catch (Exception $e) {
		echo $e->getMessage();
	}
?>

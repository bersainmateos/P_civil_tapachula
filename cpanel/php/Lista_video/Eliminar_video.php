<?php 
	require "../../../conexion/conexion.class.php";
	try {
			$Login = new OpenConexion();
			$datos=array(
				"idvideo"=>strip_tags($_POST['idvideo']),
				"status_ver"=>strip_tags($_POST['status_video'])
					);
			$guardar = $Login->Conn->prepare("UPDATE video set
				status_ver=:status_ver WHERE idvideo=:idvideo",$datos);
			$Login->Close();
			$guardar->execute($datos);
			if ($guardar) {
				echo "1";;
			}else {
				echo "0";
			}
		} catch (Exception $e) {
		echo $e->getMessage();
	}


	

?>


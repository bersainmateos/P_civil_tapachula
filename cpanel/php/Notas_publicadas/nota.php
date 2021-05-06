<?php 

	try {
				require "../../../conexion/conexion.class.php";
			$Login = new OpenConexion();
			$Listado = $Login->Conn->query("SELECT * FROM nota WHERE idnota={$_POST['idnota']}");
			if ($Listado->rowCount() > 0) {
				echo json_encode($Listado->fetchAll(PDO::FETCH_ASSOC));
			}else{
				echo "0";
			}
				
		} catch (Exception $e) {
			echo $e->getMessage();
		}

?>
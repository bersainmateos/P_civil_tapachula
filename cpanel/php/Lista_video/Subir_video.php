<?php 
	require "../../../conexion/conexion.class.php";
	$Login = new OpenConexion();
	if (isset($_FILES['video']['name'])) {
		
		try {
			
			$nom_temporal=$_FILES['video']['tmp_name']; 
    	  	$nombre=$_FILES['video']['name'];
    	  	$ruta="../../../sources/videos/".$nombre;
			$validar= move_uploaded_file($nom_temporal,$ruta);
			if ($validar) {
				$datos=array(
					"titulo"=>strip_tags($_POST['titulo']),
					"descripcion_video"=>$_POST['descripcion'],
					"idusuario"=>strip_tags((Int)$_POST['id']),
					"ruta_video"=>strip_tags("./sources/videos/".$nombre)
				);
				
				$guardar = $Login->Conn->prepare("INSERT INTO video VALUES(default,:titulo,:descripcion_video,default,:idusuario,:ruta_video,0)");
				$guardar->execute($datos);

				echo '1';
			}else{
				echo "0";
			}
			
		} catch (Exception $e) {
			echo "Ocurrio un error al subir el video. intentelo de nuevo".$e->getMessage();	
		}

	}else{
		echo "0";
	}
?>




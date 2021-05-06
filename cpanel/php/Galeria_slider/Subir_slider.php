<?php 

	if (isset($_FILES['archivo']['name'])) {
		
		try {
		 	require "../../../conexion/conexion.class.php";
			$Login = new OpenConexion();
			$nom_temporal=$_FILES['archivo']['tmp_name'];
    	  	$nombre=$_FILES['archivo']['name'];
    	  	$ruta="../../../sources/imagenes/img/".$nombre;
			$validar=move_uploaded_file($nom_temporal,$ruta);
			
			if($validar){
				$datos=array("titulo_slider"=>strip_tags($_POST['titulo']),
				"contenido_slider"=>strip_tags($_POST['descripcion']),
				"ruta_img_slider"=>strip_tags("./sources/imagenes/img/".$nombre),
				"iduser"=>strip_tags($_POST['id'])
					);
				$guardar = $Login->Conn->prepare("INSERT INTO slider VALUES(default,:titulo_slider,:contenido_slider,default,:ruta_img_slider,:iduser)");
				$guardar->execute($datos);

				echo '1';
				
				
			}else{
				echo "0";
			}
		} catch (Exception $e) {
			echo "0";	
		}

	}else{
		echo "1";
	}
?>


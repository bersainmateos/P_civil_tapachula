<?php 

	try {
		require "../../../conexion/conexion.class.php";
		$Actualizar=new OpenConexion();
		if(isset($_FILES['archivo']['tmp_name'])){
			$nom_temporal=$_FILES['archivo']['tmp_name']; 
    	  	$nombre=$_FILES['archivo']['name'];
    	  	$ruta="../../../sources/imagenes/img/".$nombre;
			$validar=move_uploaded_file($nom_temporal,$ruta);
			if ($validar) {
				
			$dato1=array(
					"titulo"=>strip_tags($_POST['titulo']),
					"contenido"=>$_POST['contenido'],
					"id"=>strip_tags((Int)$_POST['id']),
					"ruta"=>strip_tags("./sources/imagenes/img/".$nombre),
					"des"=>strip_tags($_POST['des'])
				);


			$query1=$Actualizar->Conn->prepare("UPDATE noticia SET titulo_noticia=:titulo, contenido_noticia=:contenido, img_noticia=:ruta, descripcion_img=:des WHERE idnoticia=:id");
			$query1->execute($dato1);

			}
		}else{
			$dato1=array(
					"titulo"=>strip_tags($_POST['titulo']),
					"contenido"=>$_POST['contenido'],
					"id"=>strip_tags((Int)$_POST['id'])
				);

			$query1=$Actualizar->Conn->prepare("UPDATE noticia SET titulo_noticia=:titulo, contenido_noticia=:contenido WHERE idnoticia=:id");
			$query1->execute($dato1);
		}
		echo 1;
		$Actualizar->Close();
	} catch (Exception $e) {
		echo 0;
	}


?>
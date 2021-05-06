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
				$datos=array("titulo"=>strip_tags($_POST['titulo']),
				"contenido"=>$_POST['contenido'],
				"id"=>strip_tags((Int)$_POST['id']),
				"ruta"=>strip_tags("./sources/imagenes/img/".$nombre),
				"des"=>strip_tags($_POST['des']),);

				$guardar = $Login->Conn->prepare("SELECT *FROM subir_noticia(upper(:titulo),:contenido,:id,:ruta,:des)");
				$guardar->execute($datos);
				$idnoticia=$guardar->fetchAll(PDO::FETCH_ASSOC);
				if ($guardar) {
					if (isset($_FILES["masfile"])){
    					for($x=0; $x<count($_FILES["masfile"]["name"]); $x++){
    						$file = $_FILES["masfile"];
    						$nombre = $file["name"][$x];
    						$nom_temporal = $file["tmp_name"][$x];
    						$ruta="../../../sources/imagenes/img/".$nombre;
    						$ruta_guardar[]="./sources/imagenes/img/".$nombre;
    						$validar1=move_uploaded_file($nom_temporal,$ruta);
    					}
    					if ($validar1) {
    						foreach ($ruta_guardar as $value) {
								$datos1=array("ruta_img"=>($value),
								"idnoticia"=>$idnoticia[0]['subir_noticia'],);
									$guardar1 = $Login->Conn->prepare("INSERT INTO galeria VALUES(default,:ruta_img,:idnoticia)",$datos1);
								$guardar1->execute($datos1);
							}

						}else{
							echo "0";
						}
    				}
				}	
				echo '1';	
				
			}else{
				echo "0";
			}
			$Login->Close();
		} catch (Exception $e) {
			echo "0";
		}

	}else{
		echo "0";
	}
?>
<?php

class OpenConexion extends PDO{ 

	private $srv = "localhost"; // PostgreSQL server host
 	private $usr = "postgres"; // PostgreSQL user
 	private $pas = "unach"; // PostgreSQL password
 	private $dba = "proteccion_civil"; // PostgreSQL database
 	private $prt="5432";
 	public $ruta=array();
 	private $numContenido=2; //Cantidad de noticias que se veran en la pagina principal
 	private $Views=array('Principal','Escritorio','Registrar','Lista',"Publicar_noticia",'Editar_noticia','Listar_noticias','Subir_video','Lista_video','Galeria','Subir_nota','Notas_publicadas','Galeria_slider','Subir_imagen_slider');

 	public $access="0c7fcbc71a95405a0b4af48f2e53efc7";


 	public $Conn;

	public function __construct() {
	//	$this->error("1","sd");
		$this->conectar(); 
	}
	/*
	public function error($numero,$texto){
		$ddf = fopen('Errores.log','a');
		fwrite($ddf,"[".date("r")."] $numero:$texto\r\n");
		fclose($ddf);
	}*/
	//set_error_handler('error');



	private final function conectar() {
	
	 $this->Conn = null;
 
	try{
 		$this->Conn = new PDO("pgsql:host = $this->srv;port= $this->prt;dbname= $this->dba;user= $this->usr;password= $this->pas");
 		$this->Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 		
		}catch(PDOException $e) {
			echo $e->getMessage(); 
 		}

 	}

 	 public function error_display($boolean=false){
		if($boolean) {
			ini_set('error_reporting', E_ALL | E_NOTICE | E_STRICT);
			ini_set('display_errors', '1');
			ini_set('track_errors', 'On');
		} else {
			ini_set('display_errors', '0');
		} 
 	}


 	public final function Close(){
 		$this->Conn=null;
 	}

 	public function setSalida(){
 		session_destroy();
 			$h=date('Y-d-m H:i:s');
 		 	$this->Conn->query("update bitacora set salida='{$h}' where aux='{$_SESSION['salida']}'");
 		 	$this->Close();
 		
 	}


 	public final function getSlider(){
 		$datos=$this->Conn->query("SELECT * FROM slider WHERE mostrar =1");
 		return json_encode($datos->fetchAll(PDO::FETCH_ASSOC));
 	}

 	public final function getAlerta(){
 		$datos=$this->Conn->query("SELECT * from nota WHERE status =1");
 		return json_encode($datos->fetchAll(PDO::FETCH_ASSOC)); 
 	}

 	public final function getVideo(){
 		$datos=$this->Conn->query("SELECT * from video WHERE status_ver =1 limit 2");
 		return json_encode($datos->fetchAll(PDO::FETCH_ASSOC));
 	}


 	public final function getCategorias(){
 		try {

 			$datos=$this->Conn->prepare("SELECT DISTINCT (to_char(fecha_noticia, 'YYYY')) as fecha_noticia FROM noticia WHERE status_noticia=1 ORDER BY  to_char(fecha_noticia, 'YYYY') DESC");
 			$datos->execute();
 		return json_encode($datos->fetchAll(PDO::FETCH_ASSOC));
 		} catch (Exception $e) {
 			echo "Ocurrio un error Categoria";
 		}
 	}



	public final function setNoticia_fecha($page=""){
		$saneo=str_replace(array('[',']'),array('',''),$page);
 		$lugar=explode(":", $saneo);
 		$val=1;
 			if (isset($lugar[1])) {

				$inicio= $lugar[1];
				$fin= $lugar[1];
				if (isset($lugar[2])) {
					$inicio.="-".$lugar[2]."-01";
					$aux=(((int)$lugar[2]+1)==13)? 12 : ((int)$lugar[2]+1); 
					$fin.="-".$aux."-01";
				}else{
					$val=0;
					$inicio.="-01-01";
					$fin.="-12-31";
				}
 			}else{
 				$val=0;
 				$inicio=date("Y")."-01-01";
 				$fin=date("Y")."-12-31";
 			}
 			$l=explode("-", $inicio);
 			return $lugar[0].".".$inicio.".".$fin.".".$l[0].".".$l[1].".".$val;
	}


 	public final function getNoticias($page=""){
 		try {

 			$val=explode(".", $this->setNoticia_fecha($page));

 			$datos=$this->Conn->prepare("SELECT * from paginacion(:numContenido , :page, :inicio, :fin)  as (idnoticia Integer,img_noticia text, descripcion_img text,titulo_noticia text, contenido_noticia text, fecha_noticia date, status_noticia smallint, idusuario integer)");
 		
 		$data=array(
 			"numContenido"=>$this->numContenido,
 			"page" => strip_tags($val[0]),
 			"inicio"=>$val[1],
 			"fin"=>$val[2]
 		);
 		
 		$datos->execute($data);

 		return json_encode($datos->fetchAll(PDO::FETCH_ASSOC));
 		} catch (Exception $e) {
 			echo "Ocurrio un error Noticias";
 		}
 	}

	public function setformato_fecha($fecha=""){
		if(isset($fecha)){
			$auxiliar=explode('-', $fecha);
			$Mes=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			return (String)$auxiliar[2]." de ".$Mes[$auxiliar[1]-1]." del ". $auxiliar[0];
		}
	}

	public function getNota($n=""){
		try {
			$data=array("id"=>strip_tags($n));
		$nota = $this->Conn->prepare("select idnoticia, titulo_noticia, contenido_noticia, fecha_noticia, img_noticia, descripcion_img  from noticia where idnoticia=:id and status_noticia=1");
		$nota->execute($data);
		return json_encode($nota->fetch(PDO::FETCH_ASSOC));

		} catch (Exception $e) {
			echo "Ocurrio un error Nota";
		}
	}

	public function getGaleria($n=""){
		try {
			$data=array("id"=>strip_tags($n));

		$nota = $this->Conn->prepare("select * from galeria where idnoticia=:id");
		$nota->execute($data);
		return json_encode($nota->fetchAll(PDO::FETCH_ASSOC));

		} catch (Exception $e) {
			echo "Ocurrio un error Nota";
		}
	}



	public function getNota_edicion($n=""){
		try {
			$data=array("id"=>strip_tags($n));
		$nota = $this->Conn->prepare("select idnoticia, titulo_noticia, contenido_noticia, fecha_noticia, img_noticia, descripcion_img  from noticia where idnoticia=:id");
		$nota->execute($data);
		return json_encode($nota->fetch(PDO::FETCH_ASSOC));

		} catch (Exception $e) {
			echo "Ocurrio un error Nota Edicion";
		}
	}

	public function getPaginacion($page=""){
		try {
			$val=explode(".", $this->setNoticia_fecha($page));
			$info = $this->Conn->prepare("select * from noticia where status_noticia=1 and fecha_noticia >=:inicio and fecha_noticia < :fin");
			$data=array(
				"inicio"=>$val[1],
				"fin"=>$val[2]
			);
		
			$info->execute($data);
			$aux=$info->rowCount()/$this->numContenido;
			return ceil($aux).'-'.$info->rowCount();
		} catch (Exception $e) {
			echo "Ocurio un error";	
		}
	}

	public function View($param=''){
		if (isset($param)) {
			$rutas=array();
			$rutas=explode("-", $param);
			if (in_array($rutas[0], $this->Views)) {
				include_once "./assets/{$rutas[0]}.php";
			}else{
				include_once "./assets/Error.php";
			}
		}
	}
}

?>
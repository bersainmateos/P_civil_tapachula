<?php 
	session_start();	
	include '../../conexion/conexion.class.php';
	
	$Logout=new OpenConexion();
	$Logout->setSalida();
	header("../");
?>
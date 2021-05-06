	$(document).on('click', '.Mandar', function(event) {
		location.href="./"+this.id;
	});

	function deshabilitar_noticia(idnoticia,status){
		$.ajax({
			url:"./php/Listar_noticias/estados_noticias.php",
			method:"POST",
			data:{id:idnoticia,status:status},
			beforeSend:function(){
				$("#espera").css('display', 'block');
			}, 
			success:function (respuesta){
				var res=(status==1)? "Habilitación correctamente!":"Deshabilitación correctamente!";
				if (respuesta==1) {
					alert(res);
					noticia_();
				}else{
					alert("Ocurrio un error!");
				}
			}
		});
	}

function noticia_(){
		$.ajax({
		url:"./php/Listar_noticias/buscar_noticias.php",
		method:"POST",
		data:{inicio:inicio.value.trim(),fin:fin.value.trim()},
		beforeSend:function(){
			$("#espera").css('display', 'block');
		} ,
		success:function (respuesta){
			$("#espera").css('display', 'none');
			var html="";
			try{
				var noticia= $.parseJSON(respuesta);
				
				$.each(noticia, function(index, val) {
					var boton,status,texto;
					if (val.status_noticia == '1') {
						texto="Deshabilitar noticia";
						boton="btn-warning";
						status=0;
					} else {
						texto="Habilitar noticia";
						boton="btn-danger";
						status=1;
					}

					html+=((index+1)%2==0)?"<div class='row'>":"";
					html+="<div class=\"col-md-5\" style=\"box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5); margin-top:13px;\">";
  					html+="<div class=\"card-body\">";
            		html+="<h3 style=\"color: rgba(120,1,9,0.91);\" class=\"card-title pricing-card-title\">"+val.titulo_noticia+"</h3>";
            		html+="<center> <img src=\"."+val.img_noticia+"\" width=\"100%\" height=\"200\"> </center>";
            		html+="<ul style=\"color:black;\"><li>"+val.descripcion_img+"</li></ul>";
            		html+="<div style=\"height:200px; overflow:scroll; color:black;\">"+val.contenido_noticia+"</div>";
            		html+="<button onclick=\"deshabilitar_noticia("+val.idnoticia+","+status+")\" id=\"des_noticia\" type=\"button\" class=\"btn btn-lg btn-block "+boton+" \">"+texto+"</button>";
	            	html+="<button id=\"Editar_noticia-"+val.idnoticia+"\" type=\"button\" class=\"btn btn-lg btn-block btn-primary Mandar\">Editar Noticia</button>";
    	      		html+="</div>";
       				html+="</div>";
					html+="<div class=\"col-md-1\"></div>";
					html+=((index+1)%2==0)?"</div>":"";
				});
			}catch(err){
				html=respuesta;
			}
				
			$("#lista_noticias").html(html);
		},
		error:function(){
			console.log("Error");
		}
	});
}


$("#buscar_noticias").click(function() {
	noticia_();
});	

	$("#Add_user").click(function(ev){
		ev.preventDefault();
		if (nombre.value.trim()==="") {
			alert("Ingrese nombre.");
			nombre.focus();
		}else if (paterno.value.trim()==="") {
			alert("Ingrese apellido paterno.");
			paterno.focus();
		}else if (materno.value.trim()==="") {
			alert("Ingrese apaellido materno.");
			materno.focus();
		}else if (usuario.value.trim()==="") {
			alert("Ingrese una nombre de usuario.");
			usuario.focus();
		}else if (clave.value.trim()==="") {
			alert("Ingrese una clave.");
			clave.focus();
		}else if (clave1.value!=clave.value) {
			alert("Las claves no coinciden. Intentelo de nuevo");
		}else{
		
		$.ajax({
			url:"./php/Lista/Guardar.php",
			method:"POST",
			data:{
				nombre:nombre.value,
				paterno:paterno.value,
				materno:materno.value,
				usuario:usuario.value,
				clave:clave.value
			},
			success:function(data){
				if (data==1) {
					alert("Usuario Agregado");
					$("input[type=text]").val('');
					$("input[type=password]").val('');
					$("#con-mensaje").hide();
				}else{
					alert("Ocurrió un error intentelo de nuevo."+data);
				}
			},
			error:function(){
				alert('Error en el servidor');
			}
		})
}
});

$(document).on("keyup","#clave1",function(){
		$("#con-mensaje").show();
        if(clave1.value!=clave.value){
            $('#mensaje').html('<h4>Contraseña incorrecta</h4>');
            
        }else {
           $('#mensaje').html('<h4>contraseña correcta</h4>');
           
        }
        if(clave1.value.trim()===""){
        $('#mensaje').html('<h4>Confirme la contraseña</h4>');
        
        }
    });

if (url=="Lista") {
     Listado();	
}
function Listado(){
	var tabla=$('#lista').DataTable();
		if (url=="Lista") {
	tabla.destroy();
	var html;
	$.ajax({
		url:"./php/Lista/Lista.php",
		method:"POST",
		success:function(data){
			var x=JSON.parse(data);
			$.each(x,function(i,item){
				if (item.status_usuario==1) {
					status=0;
					opcion='<button class="btn editar" data-id="'+item.idusuario+'" data-n="'+item.nombre_usuario+'" data-ap="'+item.ape_paterno_usuario+'"  data-am="'+item.ape_materno_usuario+'" data-o="'+item.usuario+'"><img src="../sources/iconos/edit.ico"></button><button class="btn" onclick=\"deshabilitar_usuario('+item.idusuario+','+status+')\" ><img src="../sources/iconos/delete.ico"></button>';
					activo='<td><i class="fa fa-circle text-success"style="color:green;">'+" "+' Habilitado</i></td>';
				}else{
					status=1;
					opcion='<button class="btn btn-success" onclick=\"deshabilitar_usuario('+item.idusuario+','+status+')\">Habilitar</button>';
					activo='<td><i class="fa fa-circle text-danger" style="color:red;">'+" "+'Deshabilitado</i></td>';
				}
					html+="<tr>";
					html+=activo;
					html+="<td>"+item.nombre_usuario+"</td>";
					html+="<td>"+item.ape_paterno_usuario+"</td>";
					html+="<td>"+item.ape_materno_usuario+"</td>";
					html+="<td>"+item.usuario+"</td>";
					html+="<td>"+opcion+"</td>";
					html+="</tr>";
							 
			})
			$(".lista_usuario").html(html);
			tabla=$('#lista').DataTable();
		},
		error:function(){
			alert('Error en el servidor');
		}
	})
}}


function deshabilitar_usuario(idusuario,status){
	var confirmar=(status==1)? "Habilitar usuario":"deshabilitar usuario";
		if (confirm(confirmar)) {
		$.ajax({
		url:"./php/Lista/Eliminar.php",
		method:"POST",
		data:{
			id:idusuario,
			status_usuario:status
		},
		success:function(data){
			var res=(status==1)? "Habilitación correctamente!":"Deshabilitación correctamente!";
				if (data==1) {
					alert(res);
					Listado();
				}else{
					alert("Ocurrio un error!");
				}
		},
		error:function(){
			alert("error");
		}
	})

	}
}

$(document).on("click",".editar",function (){

	$("#numpedido_cancelar").val($(this).data('idpedido'))
	$("#Actualizar").modal('show');
	$("#Actualizar").find('.modal-title').text('Actualizar usuario');
	$("#id_").val($(this).data('id'));
	$("#nombre_").val($(this).data('n'));
	$("#paterno_").val($(this).data('ap'));
	$("#materno_").val($(this).data('am'));
	$("#usuario_").val($(this).data('o'));

});

$("#Update_user").click(function(ev){
	ev.preventDefault();
	$.ajax({
		url:"./php/Lista/Actualizar.php",
		method:"POST",
		data:{
			id:id_.value,
			nombre:nombre_.value,
			paterno:paterno_.value,
			materno:materno_.value,
			usuario:usuario_.value
			},
			success:function(data){
				if (data==1) {
					alert('Registro actualizado');
					$("input[type=text]").val('');
					$("#Actualizar").modal('hide');
					Listado();
				}else{
					alert('Ocurrio un error intentelo de nuevo');
					console.log(data);
				}
			},
			error:function(){
				alert('Error en el servidor');
			}
	})
});


/*Noticias*/


$(document).on("click","#editar_noticia",function (event){
    event.preventDefault();
    var datos=document.getElementsByClassName('contenido');
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    if (titulo.value.trim()==='') {
        alert("Agregue un titulo");
        titulo.focus();
        return false;
    }else if(datos[0].innerHTML.trim()===''){
        alert("Agregue el contenido de la noticia");
        datos[0].focus();
        return false;
    }
        event.preventDefault();
        $(".barra").show('slow/400/fast');
        let form=document.getElementById('form_subir');
        var f=new FormData();
        f.append("archivo", fileInput.files[0]);
        f.append("titulo", titulo.value);
        f.append("contenido",datos[0].innerHTML);
        f.append("id",id.value);
        f.append("des",des.value);
        subir(f);

function subir(f){
    var estado=document.getElementById('barra_estado');
    var span=document.getElementById('sp');
    var btn=document.getElementById('bt');
    estado.classList.remove('barra_verde');
    
    let peticion= new XMLHttpRequest();

    peticion.upload.addEventListener("progress",(event)=>{
        let porcentaje=Math.round((event.loaded/event.total)*100);
        estado.style.width=porcentaje+"%";
        span.innerHTML=porcentaje+"%";
    })
    
   
    peticion.addEventListener("load",()=>{
        estado.classList.add('barra_verde');
        span.innerHTML="Proceso completado";
    });
    
    peticion.onload=function(){
    	if (this.responseText==1) {
    		$(".barra").css('display','none');;
	        alert("¡Actualizado correctamente!");
    	} else {
    		alert("Ocurrio un error al realizar la actualización");
    	}
    	
    }
    
    peticion.open("post","./php/Editar_noticia/actualizar_noticia.php");
    peticion.send(f);


} 


});


function ver_subir(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		var type=input.files[0].type;
		var name=input.files[0].name
		$("#xx").html('');
		if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
               {
                   $("#xx").append("<p style='color: red'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
               }else{
		reader.onload=function(e){
			console.log(input.files[0]);
			$('#xx').html('<img src="'+e.target.result+'" width="100%" height="100%"/>');
		}
		reader.readAsDataURL(input.files[0]);
	}
}}
$("#file").change(function(){
	ver_subir(this);

});

$("#mas_").click(function(ev){
	ev.preventDefault();
	$("#mas").hide();
	$("#cancelar").show();
	$("#input_").show();

})


$("#masfile").on("change", function(){
           $("#masimagenes").html('');
           var archivos = document.getElementById('masfile').files;
           var navegador = window.URL || window.webkitURL;
           for(x=0; x<archivos.length; x++)
           { 
               var type = archivos[x].type;
               var name = archivos[x].name;
              if(type != 'image/jpeg' && type != 'image/jpg' && type != 'image/png')
               {
                   $("#masimagenes").append("<p style='font-size:10px; color: red'>El archivo "+name+" no es del tipo de imagen permitida.</p>");
               }
               else
               {
                 var objeto_url = navegador.createObjectURL(archivos[x]);
                 $("#masimagenes").append(
                 	"<div class='col-md-55'>"+
                 	"<div class='thumbnail' style='height:60px;box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5);'>"+
                 	"<div class='image view-first'>"+
                 	"<img style='object-fit:contain;' src="+objeto_url+" width='80' height='50'>");
                 "</div></div></div>"
               }
           }
       });


$("#cancelar").click(function(ev){
	ev.preventDefault();
	$("#mas").show();
	$("#cancelar").hide();
	$("#input_").hide();
	$("#masimagenes").html('');
	var archivos = document.getElementById('masfile');
	archivos.value='';	

})



$(document).on("click","#publicar_noticia",function (event){
    
    event.preventDefault();
    var datos=document.getElementsByClassName('contenido');
    var fileInput = document.getElementById('file');
     var masfile = document.getElementById('masfile');
    var filePath = fileInput.value;
     var allowedExtensions = /(.png|.jpg|.jpeg)$/i;
    if (titulo.value.trim()==='') {
        alert("Agregue un titulo");
        titulo.focus();
        return false;
    }else if(datos[0].innerHTML.trim()===''){
        alert("Agregue el contenido de la noticia");
        datos[0].focus();
        return false;
    }else if(!allowedExtensions.exec(filePath)){
        document.getElementById('file').focus();
        alert("Error, formato invalido y/o falta una imagen");
        document.getElementById('file').focus();
        return false;
    }
        event.preventDefault();
        $(".barra").show('slow/400/fast');
        let form=document.getElementById('form_subir');
        var f=new FormData();
        
         var f=new  FormData($("#form_subir")[0]);
        f.append("archivo", fileInput.files[0]);
        f.append("titulo", titulo.value);
        f.append("contenido",datos[0].innerHTML);
        f.append("id",id.value);
        f.append("des",des.value);
        subir(f);

	function subir(f){
	    var estado=document.getElementById('barra_estado');
	    var span=document.getElementById('sp');
	    var btn=document.getElementById('bt');
	    estado.classList.remove('barra_verde');
    
    	let peticion= new XMLHttpRequest();

    	peticion.upload.addEventListener("progress",(event)=>{
        let porcentaje=Math.round((event.loaded/event.total)*100);
        estado.style.width=porcentaje+"%";
        span.innerHTML=porcentaje+"%";
    })
    	peticion.addEventListener("load",()=>{
        estado.classList.add('barra_verde');
        span.innerHTML="Proceso completado";
    });
    
    peticion.onload=function(){
    	console.log(this.responseText);
    	if (this.responseText==1) {   		
    		$('.barra').fadeIn().delay(2000).fadeOut('slow');
	        alert("¡Noticia publicada correctamente!");
    	    $('#xx').html("");
    	    fileInput.value = '';
    		titulo.value='';
    		datos[0].innerHTML="";
    		des.value="";
    		masfile.value='';
    		$("#mas").show();
			$("#cancelar").hide();
			$("#input_").hide();
    		$("#masimagenes").html('');
    	} else {
    		alert("Ocurrio un error al realizar la publicación");
    	}
    	
    }
    
    peticion.open("post","./php/Publicar_noticia/Subir_noticia.php");  
    peticion.send(f);


} 

    
});

/*Listado noticias*/

function ver_subir(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload=function(e){
			$('#xx').html('<img src="'+e.target.result+'" width="100%" height="100%"/>');
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$("#file").change(function(){
	ver_subir(this);

})

if (url=="Listar_noticias") {
listado_noticias();
}


/*notas*/
$("#Publicar_nota").click(function(ev){
	var data=document.getElementById("editor-one");
	var color=$("input[type=radio]");
	var aux=true,eleccion="";
	for (var i = 0; i < color.length; i++) {
		if ($(color[i]).prop("checked")==true) {
			eleccion=$(color[i]).attr('class');
			console.log(color);
			aux=false;
		}
	}

	if (data.innerHTML.trim()==='') {
		alert('Ingrese una descripción de la nota');
	}else if(aux){
		alert("Debe seleccionar un estilo de nota");
	}else{

		$.ajax({
			url:"./php/Subir_nota/Publicar_nota.php",
			method:"POST",
			data:{
				descripcion:data.innerHTML.trim(),
				idusuario:idusuario.value,
				color:eleccion
			},
			success:function(data){
				if (data==1) {
					alert('Nota Publicada');
					$("#editor-one").html("");
					$("."+eleccion).prop('checked',false);
				}else{
					alert('No se pudo publicar la nota. Intentelo de nuevo');
				}
			},
			error:function(){
				alert('Error en el servidor');
			}
		})
	}
})


$("#buscar_notas").click(function() {
	Notas_publicadas();	
});

function Notas_publicadas(){
	var html;
	$.ajax({
		url:"./php/Notas_publicadas/buscar_notas.php/",
		method:"POST",
		data:{inicio:inicio.value,fin:fin.value},
		beforeSend:function(){
			$("#espera").show('slow/400/fast');
		},
		success:function(data){
			$("#espera").css('display','none');
			try{
				var x=JSON.parse(data);
				$("#lista_notas").html('');
				$.each(x,function(i,item){
					var status=(item.status==0)?"<br><label style='color:red;' class='bg-danger'>Deshabilitado</label>":"<br><label style='color:blue;' class='bg-info'>Habilitado</label>";
					var html="";
					html+="<div class='col-md-6'>";
					html+="<div class='alert alert-"+item.tipo+"'>"+item.fecha_subido+status;
					html+="<button data-status='"+item.status+"' data-idnota='"+item.idnota+"' class='close borrar_nota '><span class='fa fa-remove' ></span></button>";
					html+="<button data-idnota='"+item.idnota+"' class='close editar_nota'><span class='fa fa-edit'></span></button>";
          			html+="<h4>"+item.descripcion_nota+"</h4>";
        			html+="</div>";
      				html+="</div>";
					$("#lista_notas").append(html);
					console.log(data);
				})
			}catch(err){
				console.log(data);
				$("#lista_notas").html("<h3 class='text-danger'>Sin Resultados</h3>");
			}

		}
	})
}

$(document).on("click",".editar_nota",function(){
	$("#update_nota").modal('show');
	$("#update_nota").find('.modal-title').text('Editar Nota');
	var color=$("input[type=radio]");

	$.ajax({
		url:"./php/Notas_publicadas/nota.php",
		method:"POST",
		data:{
			idnota:$(this).data('idnota')
		},
		success:function(data){
			var k=JSON.parse(data);
			$.each(k,function(i,item){
				console.log(item.descripcion_nota);
				$("#editor-one").html(item.descripcion_nota);
				$("#idnota").val(item.idnota);
				for (var i = 0; i < color.length; i++) {
					if ($(color[i]).attr('class')==item.tipo) {
						$(color[i]).prop("checked",true);
					}
				}

			})
			
		},
		error:function(){
			alert('Error en el servidor');
		}
	})

})  
        
$("#Actualizar_nota").click(function(ev){
	var data=document.getElementById("editor-one");
	var color=$("input[type=radio]");
	var aux=true,eleccion="";
	for (var i = 0; i < color.length; i++) {
		if ($(color[i]).prop("checked")==true) {
			eleccion=$(color[i]).attr('class');
			console.log(color);
			aux=false;
		}
	}

	if (data.innerHTML.trim()==='') {
		alert('Ingrese una descripción de la nota');
	}else if(aux){
		alert("Debe seleccionar un estilo de nota");
	}else{

		$.ajax({
			url:"./php/Notas_publicadas/actualizar_nota.php",
			method:"POST",
			data:{
				descripcion:data.innerHTML.trim(),
				idnota:idnota.value,
				color:eleccion
			},
			success:function(data){
				if (data==1) {
					alert('Actualización correctamente!');
					$("#update_nota").modal("hide");
					Notas_publicadas();
				}else{
					alert('No se pudo actualizar');
				}
			},
			error:function(){
				alert('Error en el servidor');
			}
		})
	}
})


$(document).on("click",".borrar_nota",function(){
	var mnj=($(this).data('status')==1) ? "¿Deshabilitar nota desea continuar ?" : "¿Habilitar nota desea continuar?";
	var st=($(this).data('status')==1) ? 0:1;
	if (confirm(mnj)) {
		$.ajax({
			url:"./php/Notas_publicadas/deshabilitar_nota.php",
			method:"POST",
			data:{
				idnota:$(this).data('idnota'),
				status:st
			},
			success:function(data){
				if (data==1) {
					alert("Exito!!");
					Notas_publicadas();
				}else{
					alert("Ocurrio un error");
				}
			}, 
			error:function(){
				alert('Error en el servidor');
			}
		})
	}

});


/*VIDEOS*/

if (url=="Lista_video") {
    	lista_videos();
}
function lista_videos(){
	
	var ruta_video;
	
	$.ajax({
		url:"./php/Lista_video/Lista_videos.php",
		method:"POST",
		success:function(data){
			if (data!=0) {
			var x=JSON.parse(data);
			console.log(data);
			
			$("#menu_video").html('');
			 $.each(x,function(i,item){
			 	if (item.status_ver==1) {
					status_video=0;
					habilitado='<small style="color:green" class="alert-success">Habilitado</small>';
					boton="<button class='btn btn-danger btn-block' onclick=\"deshabilitar_video("+item.idvideo+","+status_video+")\">Deshabilitar</button>";	
				}else{
					status_video=1;
					habilitado='<small class="alert-danger" style="color:red">Deshabilitado</small>';
					boton="<button class='btn btn-success btn-block' onclick=\"deshabilitar_video("+item.idvideo+","+status_video+")\" >Habilitar</button>";
				
				}
				ruta_video=item.ruta_video;
				$("#menu_video").append(
					"<div class='col-md-3'>"+
					"<div class='thumbnail' style='height:200px;box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5);'>"+
					"<div>"+"<strong style='color:black'>Subido el  :</strong>  "+item.fecha_subido+" "+habilitado+"</div><strong>"+item.titulo+"</strong><br>"+
					"<div>"+
					"<video controls style='width:100%;' src='."+ruta_video+"'></video>"+
					"</div>"+
					"</div>"+
					""+boton+""+
					"</div>"+
					"</div>"
				)
			});
			}else{
				$("#menu_video").html('<div class="alert alert-danger" style="color:red;font-size:20px;">No se encontro ningun video</div>');
			}
		}
	})
}


function deshabilitar_video(idvideo,status_video){

	var confirmar=(status_video==1)? "Habilitar video":"Deshabilitar video";
	if (confirm(confirmar)) {
		$.ajax({
 			url:"./php/Lista_video/Eliminar_video.php",
 			method:"POST",
 			data:{
 				idvideo:idvideo,
 				status_video:status_video
 			},
 			success:function(data){
 				var res=(status_video==1)? "Habilitación correctamente!":"Deshabilitación correctamente!";
				if (data==1) {
					alert(res);
					lista_videos();
				}else{
					alert("Ocurrio un error!");
				}
 			},
 			error:function(){
 				alert('Error en el servidor');
 			}
 		})

	}
}


function subir_video(ev){
   ev.preventDefault();
    var fileInput = document.getElementById('file_video');
    var descripcion_video=document.getElementById("descripcion_video");
    var filePath = fileInput.value;
    var allowedExtensions = /(.mp4)$/i;
    if(!allowedExtensions.exec(filePath)){
    	alert('Formato invalido');
    }else if (titulo_video.value.trim()==='') {
    	alert('Ingrese un titulo al video');
    	titulo_video.focus();
    }else if (descripcion_video.innerHTML.trim()==='') {
    	alert('Ingrese una descripción al video');
    	 descripcion_video.focus();
    }else{
         event.preventDefault();
         var f = new FormData();
        f.append("video",fileInput.files[0]);
        f.append("titulo",titulo_video.value);
        f.append("descripcion",descripcion_video.innerHTML.trim());
        f.append("id",id.value);
        $(".barra").show();
       var form=document.getElementById('subir_videos');
            subir(form);
            
function subir(form){
    var estado=document.getElementById('barra_estado');
    var span=document.getElementById('sp');
    var btn=document.getElementById('bt');
    estado.classList.remove('barra_verde');
    var peticion= new XMLHttpRequest();
    peticion.upload.addEventListener("progress",(event)=>{
        var porcentaje=Math.round((event.loaded/event.total)*100);
        estado.style.width=porcentaje+"%";
        span.innerHTML=porcentaje+"%";
    })

    peticion.addEventListener("load",()=>{
        estado.classList.add('barra_verde');
        span.innerHTML="Proceso completado";
    });
    
    peticion.onload=function(){
        var fuc=this.responseText;
        console.log(fuc);
        if(parseInt(fuc)==1){
            fileInput.value = '';
            titulo_video.value='';
            descripcion_video.innerHTML="";
            //$('.barra').fadeIn().delay(2000).fadeOut('slow');
            alert('Video subido');
           }else{
           	alert('Ocurrio un error intentelo de nuevo');
           }
    }

    peticion.open("post","./php/Lista_video/Subir_video.php");
    peticion.send(f);
     
} 

    }
}


/*IMAGENES*/

if (url=="Galeria") {
	galeria();
}

function galeria(){
	var html;
	var ruta_imagen;
	$.ajax({
		url:"./php/Galeria/Galeria.php",
		method:"POST",
		success:function(data){
			if (data!=0) {
			console.log(data);
			var x=JSON.parse(data);
			$("#galeria_imagenes").html('');
			 $.each(x,function(i,item){
				ruta_imagen="."+item.ruta_img;
				if (item.status_noticia==1) {
					status="<strong style='color:green' class='alert-success'>imagen Habilitada</strong>";
				}else{
					status="<strong style='color:red;' class='alert-danger'>imagen  deshabilitada</strong>";
				}
				console.log(item.ruta_img);
				$("#galeria_imagenes").append(
				"<div class='col-md-55'>"+
				"<div class='thumbnail' style='height:150px;box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5);'>"+
				"<div class='image view-first'>"+
				"<img style='object-fit:contain; width:260px;cursor:pointer;' src='"+ruta_imagen+"' alt='no se pudo cargar la imagen' />"+ 
				
				"</div>"+
				""+status+""+
				"</div>"+
				"</div>"
				)
			});
			}else{
				$("#galeria_imagenes").html('<div class="alert alert-danger" style="color:red;font-size:20px;">No se encontro ninguna imagen</div>');
			
			}
				
		}
			
	})
}


/*SLIDER*/

if (url=="Galeria_slider") {
	galeria_slider();
}

function galeria_slider(){
	var ruta_imagen;
	var activo;
	$.ajax({
		url:"./php/Galeria_slider/slider.php",
		method:"POST",
		success:function(data){
			if (data!=0) {
			var x=JSON.parse(data);
			$("#galeria_slider").html('');
			 $.each(x,function(i,item){
				ruta_img_slider=item.ruta_img_slider;
				if (item.mostrar==1) {
					status=0;
					activo="<button class='btn btn-danger btn-block' onclick=\"deshabilitar_slider("+item.idslider+","+status+")\">Deshabilitar";
				}else{
					status=1;
					activo="<button class='btn btn-success btn-block' onclick=\"deshabilitar_slider("+item.idslider+","+status+")\">Habilitar";
				}
				$("#galeria_slider").append(
					"<div class='col-md-55'>"+
					"<div class='thumbnail' style='height:200px;box-shadow: 2px 2px 2px 2px rgba(0,0,0,0.5);'>"+
					"<div class='image view-first'>"+
					"<img style='object-fit:contain; width:260px;cursor:pointer;' src='."+ruta_img_slider+"' alt='no se pudo cargar la imagen' />"+ 
					"<div class='mas &raquo'>"+
					"<div class='tools tools-bottom'>"+
					"</div>"+
					"</div>"+
					"</div>"+
					"<div class='caption'>"+
					""+activo+""+
					"</div>"+
					"</div>"+
					"</div>"
				)
			});
			}else{
				$("#galeria_slider").html('<div class="alert alert-danger" style="color:red;font-size:20px;">No se encontro ninguna imagen</div>');	
			}
		}
	})
}

function deshabilitar_slider(idslider,status){
	$.ajax({
		url:"./php/Galeria_slider/estatus_slider.php",
		method:"POST",
		data:{
			idslider:idslider,
			activo:status
		},
		success:function(respuesta){
			var res=(status==1)? "Habilitación correctamente!":"Deshabilitación correctamente!";
				if (respuesta==1) {
					alert(res);
					galeria_slider();
				}else{
					alert("Ocurrio un error!");
				}
		},
		error:function(){
			alert('Error en el servidor');
		}
	})
}

 function slider(input){
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload=function(e){
			$('#mostrar_slider + img').remove();
			$('#mostrar_slider').after('<img src="'+e.target.result+'" alt="No se encontro la imagen" width="100%" height="100%"/>');
		}
		reader.readAsDataURL(input.files[0]);
	}
}
$("#file_slider").change(function(){
	slider(this);
})

$("#Guardar_slider").click(function(ev){
   ev.preventDefault();
    var fileInput = document.getElementById('file_slider');
    var contenido_slider=document.getElementById("contenido_slider");
    var filePath = fileInput.value;
	var allowedExtensions = /(.png|.jpg|.jpeg)$/i;
	
	if(!allowedExtensions.exec(filePath)){ 
		alert('Formato invalido');
	}else{
         event.preventDefault();
         var f = new FormData();
        f.append("archivo",fileInput.files[0]);
        f.append("titulo",titulo_slider.value); 
        f.append("descripcion",contenido_slider.innerHTML.trim());
        f.append("id",id.value);
        $(".barra_").show();
       var form=document.getElementById('form_slider');
            subir(form);
            
function subir(form){
    var estado=document.getElementById('barra_estado');
    var span=document.getElementById('sp');
    var btn=document.getElementById('bt');
    estado.classList.remove('barra_verde');
    var peticion= new XMLHttpRequest();
    peticion.upload.addEventListener("progress",(event)=>{
        var porcentaje=Math.round((event.loaded/event.total)*100);
        estado.style.width=porcentaje+"%";
        span.innerHTML=porcentaje+"%";
    })
    peticion.addEventListener("load",()=>{
        estado.classList.add('barra_verde');
       
    });
    
    peticion.onload=function(){
      var dD=document.getElementById('dx');
        //dD.innerHTML=this.responseText;
        var fuc=this.responseText;
        console.log(fuc);
        if(parseInt(fuc)==1){
            fileInput.value = '';
            titulo_slider.value='';
            contenido_slider.innerHTML="";
            $('#mostrar_slider + img').remove();
            alert('Imagen subida');     
            $('.barra_').fadeIn().delay(2000).fadeOut('slow');
        }else{
        	alert("Ocurrio un error!");
        	span.innerHTML="Error";
        }
    }

    peticion.open("post","./php/Galeria_slider/Subir_slider.php");
    peticion.send(f);
     
} 

    }

})


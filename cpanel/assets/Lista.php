<div style="padding-top: 60px;width: 90%;margin-left: 50px;">
	
<center>
	<table class="table table-hover table-bordered" id="lista" style="width: 100%; color:black;box-shadow: 0px 4px 6px 0px #d79810;border-radius: 5px;">
		<thead style="background:#c2ab7a;">
			<th>ESTADO</th>
			<th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>APELLIDO MATERNO</th>
			<th>NOMBRE DE USUARIO</th>
			<th style="width: 100px;">OPCIÓN</th>
		</thead>
		<tbody class="lista_usuario">
			
		</tbody>
	</table>
</center>
</div>

<div id="Actualizar" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#6b0f0f; color: white;">
                <center>
                    <h4 class="modal-title"></h4>
                </center>
                <div style="background:">
                	<img src="../sources/imagenes/logo.png" width="90">
                </div>
            </div>
            <div class="modal-body">
                <section>		
					<form >
						<input type="hidden" id="id_" >
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre_" placeholder="Nombre completo" autocomplete="off">
						<label for="correo">Apellido paterno</label>
						<input type="text" class="form-control" id="paterno_" placeholder="Apellido Paterno" autocomplete="off">
						<label for="usuario">Apellido Materno</label>
						<input type="text" class="form-control" id="materno_" placeholder="Apellido Materno" autocomplete="off">
						<label for="clave">Usuario</label>
						<input type="text" class="form-control" id="usuario_" placeholder="Nombre de Usuario" autocomplete="off"><br><br>
						<input type="submit" value="Actualizar" class="btn btn-success btn-block" id="Update_user">
					</form>
				</section>
            </div>
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>



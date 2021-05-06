<section id="container">
	<div class="form_register">
		<center>
			<div class="con">
				<h1>Registrar usuario</h1>
			</div>
		</center>
		<hr>
		<form>
			<label for="nombre">Nombre</label>
			<input type="text"  class="form-control" id="nombre" placeholder="Nombre completo" autocomplete="off">
			<label for="correo">Apellido paterno</label>
			<input type="text" class="form-control" id="paterno" placeholder="Apellido Paterno" autocomplete="off">
			<label for="usuario">Apellido Materno</label>
			<input type="text" class="form-control" id="materno" placeholder="Apellido Materno" autocomplete="off">
			<label for="clave">Usuario</label>
			<input type="text" class="form-control" id="usuario" placeholder="Nombre de Usuario" autocomplete="off">
			<label for="rol">Clave</label>
			<input type="password" class="form-control" id="clave" placeholder="Clave de acceso" autocomplete="off">
			<label for="rol">Repita la Clave</label>
			<input type="password" class="form-control" id="clave1" placeholder="Clave de acceso" autocomplete="off">
			<div class="alert" id="con-mensaje" style="display: none">
				<small style="" id="mensaje">
				</small>
			</div><br><br>
			<input type="submit" value="Crear usuario" class="btn btn-success btn-block" id="Add_user">
		</form>
	</div>
</section>
<div style="display: inline-flex; width: 700px">
 	<input id="inicio" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
 	<input id="fin" type="date" class="form-control" style="margin-left: 10px;" value="<?php echo date('Y-m-d'); ?>">
 	<button id="buscar_noticias" class="btn btn-success" style="margin-left: 10px; "><span class="fa fa-search" style="font-size: 20px;"></span></button>
</div>

<br>
<center>
	<img style="display: none;" id="espera" src="../sources/imagenes/espera.gif"></center>
<div id="lista_noticias" >
	
</div>
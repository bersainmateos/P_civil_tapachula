<?php 
  $Editar= new OpenConexion();
  $id=explode("-", $_GET['modulo']);
  $Datos=json_decode($Editar->getNota_edicion($id[1]));
?>
<div class="barra" style="display: none;">
                            <div class="barra_azul" id="barra_estado">
                              <span id="sp">0%</span>
    </div>
  </div>

<div style="display: flex;">
         <div style="width: 65%; margin-left: 20px;">
         <label style="font-size: 30px;">Titulo de la noticia</label>
        <input type="text" class="form-control" id="titulo" value="<?php echo $Datos->{'titulo_noticia'} ?>">
    <br>
           <label style="font-size: 30px;">Contenido</label>
            <div class="btn-toolbar editor"  data-role="editor-toolbar" data-target="#editor-one" style="box-shadow: 2px 2px 2px rgba(0,0,0,.5); border: 1px solid rgba(0,0,0,.4);">
                    
                    <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                      <ul class="dropdown-menu" control="0">
                        <li>
                          <a data-edit="fontSize 5">
                            <p style="font-size:17px">Huge</p>
                          </a>
                        </li>
                        <li>
                          <a data-edit="fontSize 3">
                            <p style="font-size:14px">Normal</p>
                          </a>
                        </li>
                        <li>
                          <a data-edit="fontSize 1">
                            <p style="font-size:11px">Small</p>
                          </a>
                        </li>
                      </ul>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                      <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                      <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                      <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                      <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                      <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                      <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                      <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                      <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                      <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                      <div class="dropdown-menu input-append">
                        <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                        <button class="btn" type="button">Add</button>
                      </div>
                      <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                    </div>

                    <div class="btn-group">
                      <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                      <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                    </div>
                  </div>
                  <div id="editor-one" class="editor-wrapper contenido">
                    <?php echo $Datos->{'contenido_noticia'}; ?>
                  </div>
</div>

<form id="form_subir"  enctype="multipart/form-data" style="width: 35%; margin-left: 20px;">
  <div class="div-row">
    <input type="hidden" id="id" value="<?php echo $Datos->{'idnoticia'}; ?>">
    <div id="correcto" style="display: none;">
    </div>
  </div>
  <div class="div-row">
<br>
    <div class="tam2-div1">
      <div id="xx" style="overflow-wrap: hidden; width: 100%; height: 250px; border-radius: 10px; box-shadow: 2px 2px 2px 2px rgba(0,0,0,.4);">
        <img src=".<?php echo $Datos->{'img_noticia'} ?>" width="100%" height="100%"/>
      </div>
      <br>
      <div class="tam-div1">
      <label style="font-size: 25px;">Seleccione una imagen para la noticia</label>
      <div>
        <input type="file" class="form-control" name="archivo" id="file">
      </div>
    </div>
    <br>
    <br>
    <label style="font-size: 20px;">Puede hacer una descripcion de la imagen seleccionada</label>
      <div>
        <textarea id="des" class="resizable_textarea form-control" placeholder="Descripción de la imagen"><?php echo $Datos->{'descripcion_img'}; ?>
        </textarea>
      </div>  
    </div>
  </div>
  <div><br><br>
    <center><button class="btn btn-success btn-block" id="editar_noticia"><h2 style="font-weight: bold;">REALIZAR CAMBIO</h2></button></center>
  </div>
</form>
</div>
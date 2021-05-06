<div id="update_nota" class="modal fade" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#6b0f0f; color: white;">
        <center>
          <h4 class="modal-title"></h4>
        </center>
        <div>
          <img src="../sources/imagenes/logo.png" width="90">
        </div>
      </div>
      <div class="modal-body">
        <section id=""> 
           <div style="width: 100%; ">
          <input type="hidden" id="idusuario" value="<?php echo $_SESSION['session']['idusuario'] ?>">
          <input type="hidden" id="idnota" value="">
          <label style="font-size: 30px; text-align: center;">Contenido de la nota</label>
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
                  <div id="editor-one" class="editor-wrapper contenido descripcion_nota" style="height: 100px; width: 100%;"></div>


</div><br><br>
<div >
  
    <div>
      <h3>Selecciona el tipo de Nota</h3>
      <label class="radio-inline"><input type="radio" name="c" class="success"></label>
      <label class="radio-inline"><input type="radio" name="c" class="danger"></label>
      <label class="radio-inline"><input type="radio" name="c" class="warning"></label>
      <label class="radio-inline"><input type="radio" name="c" class="info"></label>
    
  </div>
</div>
                  <br><br>
                  <input type="submit" style="font-size: 20px;" value="Publicar nota" id="Actualizar_nota" class="btn btn-success btn-block">

        </section>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>






<div style="display: inline-flex; width: 700px">
  <input id="inicio" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>">
  <input id="fin" type="date" class="form-control" style="margin-left: 10px;" value="<?php echo date('Y-m-d'); ?>">
  <button id="buscar_notas" class="btn btn-success" style="margin-left: 10px;"><span class="fa fa-search"></span></button>
</div>

<br><br><br>
<center>
  <img style="display: none;" id="espera" src="../sources/imagenes/espera.gif"></center>
<div id="lista_notas" >
  
</div>
















<div style="width: 90%; margin-left: 50px;">
  <div class="barra_" style="width: 100%; float: right; display: none;">
    <div class="barra_azul" id="barra_estado">
        <span id="sp"></span>
    </div>
</div>
<input type="hidden" id="id" value="<?php echo $_SESSION['session']['idusuario'] ?>">
<div>
  <form id="form_slider" nctype="multipart/form-data">
    <div style="display: inline-block; width: 60%">
      <label style="font-size: 30px;">Titulo:</label>
      <input type="text" id="titulo_slider" class="form-control">
    </div>
    <div style="float: right; width: 35%;">
      <label style="font-size: 30px;">Seleccione una imagen</label>
      <input type="file" id="file_slider" class="form-control">
    </div><br><br>
    <div style="width: 60%; display: inline-block;">
          <div style="display:flex;">
            <div style="width: 100%; ">
                <label style="font-size: 30px; text-align: center;">Contenido:</label>
                <div class="btn-toolbar editor"  data-role="editor-toolbar" data-target="#contenido_slider" style="box-shadow: 2px 2px 2px rgba(0,0,0,.5); border: 1px solid rgba(0,0,0,.4);">
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
                <div id="contenido_slider" class="editor-wrapper contenido descripcion_nota" style="height: 200px; width: 99%;">
                </div>
              </div>
          </div>
        </div>
    <div style="float: right; width: 35%; padding-top: 10px;">
      <div style="overflow-wrap: hidden; width: 100%; height: 250px; border-radius: 10px; box-shadow: 4px 4px 6px 4px #c2ab7a;">  
        <div  id="mostrar_slider">
        </div>
      </div>
    </div>
    <div style="width: 35%;float: right;"> 
      <button style="font-size: 20px;" id="Guardar_slider" class="btn btn-success btn-block">Guardar</button>
    </div>
  </form>
</div>

</div>
<div style="padding-left:50px;width: 95%;">
  <div class="barra" style="width: 100%; display: none;">
      <div class="barra_azul" id="barra_estado">
        <span id="sp"></span>
      </div>
    </div>
  <form id="subir_videos" enctype="multipart/form-data">
    <input type="hidden" id="id" value="<?php echo $_SESSION['session']['idusuario'] ?>">
    <div style="width: 40%; display: inline-block;">
      <label style="font-size: 30px;">Titulo</label>
      <input type="text" class="form-control" id="titulo_video" autocomplete="off">
    </div>
    
    <div style="width: 59%; float: right;">
      <div style="display:flex;">
        <div style="width: 100%; ">
          <center><label style="font-size: 30px; text-align: center;">Descripción del video</label></center>
          <div class="btn-toolbar editor"  data-role="editor-toolbar" data-target="#descripcion_video" style="box-shadow: 2px 2px 2px rgba(0,0,0,.5); border: 1px solid rgba(0,0,0,.4);">
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
          <div id="descripcion_video" class="editor-wrapper contenido descripcion_nota" style="height: 200px; width: 99%;">
          </div>
        </div>
      </div>
    </div><br><br><br>
    <div style=" width: 40%;">
      <label style="font-size: 30px;">Seleccione un video</label>
      <input class="form-control" type="file" multiple="" id="file_video">
    </div><br><br> 
    
    <div style="width: 59%;float: right; padding-top: 10px; ">
      <input style="font-size: 20px;" type="submit" value="Subir video" class="btn btn-success btn-block" onclick="subir_video(event)">
    </div>      
  </form>
</div>












            
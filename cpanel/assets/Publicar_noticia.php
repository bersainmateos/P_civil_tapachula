<div class="barra" style="display: none;">
  <div class="barra_azul" id="barra_estado">
    <span id="sp">0%</span>
  </div>
</div>
<div style="display: flex;">
  <form id="form_subir"  enctype="multipart/form-data" style="margin-left: 20px;" method="post">
    <div>
      <input type="hidden" id="id" value="<?php echo $_SESSION['session']['idusuario'] ?>"> 
    </div>
    <div style="width: 60%; display: inline-block;">
      <label style="font-size: 30px;">Titulo de la noticia</label>
      <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off">
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
          <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)">
            <i class="fa fa-bold"></i>
          </a>
          <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)">
            <i class="fa fa-italic"></i>
          </a>
          <a class="btn" data-edit="strikethrough" title="Strikethrough">
            <i class="fa fa-strikethrough"> </i>
          </a>
          <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)">
            <i class="fa fa-underline"></i>
          </a>
        </div>
        <div class="btn-group">
          <a class="btn" data-edit="insertunorderedlist" title="Bullet list">
            <i class="fa fa-list-ul"></i>
          </a>
          <a class="btn" data-edit="insertorderedlist" title="Number list">
            <i class="fa fa-list-ol"></i>
          </a>
          <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)">
            <i class="fa fa-dedent"></i>
          </a>
          <a class="btn" data-edit="indent" title="Indent (Tab)">
            <i class="fa fa-indent"></i>
          </a>
        </div>
        <div class="btn-group">
          <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)">
            <i class="fa fa-align-left"></i>
          </a>
          <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)">
            <i class="fa fa-align-center"></i>
          </a>
          <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)">
            <i class="fa fa-align-right"></i>
          </a>
          <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)">
            <i class="fa fa-align-justify"></i>
          </a>
        </div>
        <div class="btn-group">
          <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink">
            <i class="fa fa-link">  </i>
          </a>
          <div class="dropdown-menu input-append">
            <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
            <button class="btn" type="button">Add</button>
          </div>
          <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
        </div>
        <div class="btn-group">
          <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)">
            <i class="fa fa-undo">    </i>
          </a>
          <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)">
            <i class="fa fa-repeat"></i>
          </a>
        </div>
      </div>
      <div id="editor-one" class="editor-wrapper contenido">
      
      </div>    
    </div>
    <div style="width: 37%; float: right; margin-left: 20px;">
      <br>
		  <div id="xx" style="overflow-wrap: hidden; border-radius: 10px; box-shadow: 2px 2px 2px 2px rgba(0,0,0,.4);">
      </div>
      <br>
      <div>
        <label style="font-size: 25px;">Seleccione una imagen para la noticia</label>
        <div>
				  <input type="file" class="form-control" name="archivo" id="file">
        </div>
		  </div>
      <br>
        <label style="font-size: 20px;">Puede hacer una descripcion de la imagen seleccionada</label>
      <div>
        <textarea id="des" class="resizable_textarea form-control" placeholder="Descripción de la imagen"></textarea>
      </div>  	
      <br>
      <div style=" width: 100%; font-weight: bold;" id="mas">
        <button class="btn btn-primary btn-block" id="mas_"> Seleccionar más imagenes</button>
      </div> 
      <div style="display:none ;" id="input_">
        <div style="width: 25%; display:inline-block;">
          <button class="btn btn-danger" id="cancelar" >Cancelar</button>
        </div>
        <div style="width: 75%; float: right;">
          <input class="form-control" type="file" name="masfile[]" id="masfile" multiple>
        </div>
      </div>
      <div id="masimagenes" >   
      </div>
		  <br>
      <button class="btn btn-success btn-block" id="publicar_noticia"><h2 style="font-weight: bold;">PUBLICAR NOTICIA</h2>
      </button>
    </div>
    <div><br><br>
    </div>
  </form>
</div>
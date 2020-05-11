<script src="../../js/newPublicacion.js"></script>
<div id="asideID" class="aside bg-white col-sm-12 col-md-12">
    <div class="my-2">
        <h5 class="card-title Oswald">Nueva Publicación</h5>
    </div>
    <form id="newPublicacion" action="#" method="post" class="form-row">

      <div class="form-group col-12">
        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" value="Imagen" class="custom-file-input" id="txtImg" onblur="disabledBtn()" onkeyup="disabledBtn()" accept=".png, .jpg, .jpeg">
            <label class="custom-file-label" for="inputGroupFile03">Seleccione una imagen descriptiva</label>
          </div>
        </div>
      </div>

      <div class="form-group col-12">
        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" value="Imagen" class="custom-file-input" id="txtFiles" onblur="disabledBtn()" onkeyup="disabledBtn()" accept=".pdf,.docx">
            <label class="custom-file-label" for="inputGroupFile03">Seleccione el archivo</label>
          </div>
        </div>
      </div>

      <div class="form-gruop col-12 my-2">
        <label class="Open-Sans" for="text">Nombre</label>
        <input class="form-control Open-Sans" type="text" name="txtNombre" id="txtNombre" onblur="disabledBtn()" onkeyup="disabledBtn()">
      </div>

      <div class="form-gruop col-12 my-2">
        <label class="Open-Sans" for="text">Descripción</label>
        <textarea class="form-control Open-Sans" id="txtTextarea" placeholder="Descripcion" onblur="disabledBtn()" onkeyup="disabledBtn()"></textarea>
      </div>

      <div class="form-gruop col-12">
        <button id="btn" class="btn btn-primary Oswald my-2" disabled="disabled" type="submit">
          Publicar
        </button>
      </div>
    </form>
</div>
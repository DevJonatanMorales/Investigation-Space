<script src="../../js/newPublicacion.js"></script>
<div id="asideID" class="aside bg-white col-sm-5 col-md-4">
    <div class="my-2">
        <h5 class="card-title Oswald">Nueva Publicacion</h5>
    </div>
    <form id="newPublicacion" action="#" method="post" class="form-row">
      
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" value="Imagen" class="custom-file-input" id="txtFiles" onblur="disabledBtn()" onkeyup="disabledBtn()">
          <label class="custom-file-label" for="inputGroupFile03">Seleccion una imagen</label>
        </div>
      </div>
      
      <div class="form-gruop col-12">
        <label class="Open-Sans" for="text">Nomrbe</label>
        <input class="form-control Open-Sans" type="text" name="txtNombre" id="txtNombre" onblur="disabledBtn()" onkeyup="disabledBtn()">
      </div>
      <div class="form-gruop col-12">
        <label class="Open-Sans" for="text">Descripcion</label>
        <textarea class="form-control Open-Sans" id="txtTextarea" placeholder="Descripcion" onblur="disabledBtn()" onkeyup="disabledBtn()"></textarea>
      </div>
      <div class="form-gruop col-12">
        <button id="btn" class="btn btn-primary Oswald my-2" disabled="disabled" type="submit">
          Publicar
        </button>
    </form>
</div>
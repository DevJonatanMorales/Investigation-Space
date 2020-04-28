<div id="asideID" class="aside bg-white col-sm-5 col-md-4">
    <div class="my-2">
        <h5 class="card-title Oswald">Nueva Publicacion</h5>
    </div>
    <form id="newPublicacion" action="#" method="post" class="form-row">
      
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" value="Imagen" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
          <label class="custom-file-label" for="inputGroupFile03">Seleccion una imagen</label>
        </div>
      </div>
      
      <div class="form-gruop col-12">
        <label class="Open-Sans" for="text">Nomrbe</label>
        <input class="form-control Open-Sans" type="text" name="txtNombre" id="txtNombre">
      </div>
      <div class="form-gruop col-12">
        <label class="Open-Sans" for="text">Descripcion</label>
        <textarea class="form-control Open-Sans" id="validationTextarea" placeholder="Descripcion" required></textarea>
      </div>
      <div class="form-gruop col-12">
        <button class="btn btn-primary Oswald my-2" type="submit">
          Publicar
        </button>
      </div>
    </form>
</div>
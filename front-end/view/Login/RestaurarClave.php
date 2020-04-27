<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once('../layout/headIndex.php'); ?>
    <script src="../../js/vlrFormRestaurarCuenta.js"></script>
  </head>
<body>
  <?php $estado = 'clave'; require_once('../menus/menuIndex.php'); ?>
  <div id="idForm" class="container col-sm-12 col-md-8 col-lg-4">
    <form class="FormIndex" action="#" method="post" id="idform" autocomplete="off">
      <div class="form-gruop">
          <input type="hidden" id="accion" name="accion" value="RestaurarCuenta">
          <input type="hidden" id="txtUserId" name="txtUserId">
          <h1 class="text-white Acme text-center">Restaurar Contraseña</h1>
      </div>
      <div class="form-group">
        <label class="text-white Open-Sans" for="text">Codigo</label>
        <input id="txtCodigoDb" type="hidden" name="txtCodigoDb">
        <input class="txtCampo" type="text" name="txtCodigo" id="txtCodigo" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
      </div>
      <div class="form-group">
        <label class="text-white Open-Sans" for="text">Nueva Contraseña</label>
        <input class="txtCampo" type="password" name="txtNew" id="txtNew" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" pattern="[A-Z]{1}[a-z]{5}[0-9]{2}">
      </div>
      <div class="form-group">
        <label class="text-white Open-Sans" for="text">Confirmar Contraseña</label>
        <input class="txtCampo" type="password" name="txtConfirmar" id="txtConfirmar" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" pattern="[A-Z]{1}[a-z]{5}[0-9]{2}">
      </div>
      <div class="form-group">
        <button class="btn btn-success" id="btn" type="submit">
            Guardar
        </button>
      </div>
    </form>
  </div>

  <div id="idAlert" class="container col-sm-12 col-md-4 FormIndex">
    <h1 class="text-danger text-center text-white"><i class="fas fa-exclamation-triangle"></i></h1>
    <h4 class="card-title Open-Sans text-center text-white">Advertencia</h4>
    <p class="card-text text-white">El plazo de 24 horas para cambiar la contraseña ya expiro, por favor realice una nueva solicitud.</p>
    <a class="btn btn-success Open-Sans" href="?controlador=RecuperarCuenta&accion=recuperarCuenta">Nueva solicitud</a>
  </div>
</body>
</html>

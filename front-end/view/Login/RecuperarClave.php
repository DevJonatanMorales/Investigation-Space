<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once('../layout/headIndex.php'); ?>
    <script src="../../js/vlrFormRecuperarCuenta.js"></script>
  </head>
<body>
  <?php $estado = 'clave'; require_once('../menus/menuIndex.php'); ?>
  <div class="container col-sm-12 col-md-8 col-lg-4">
    <form class="FormIndex" action="#" method="post" id="idform" autocomplete="off">
      <div class="form-gruop">
          <input type="hidden" name="accion" value="RecuperarCuenta">
          <h1 class="text-white Acme text-center">Recuperar Contraseña</h1>
      </div>
      <div class="form-group">
        <label class="text-white Open-Sans" for="text">Correo</label>
        <input class="txtCampo" type="text" name="txtEmail" id="txtEmail" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
      </div>
      <div class="form-group">
        <button class="btn btn-success" id="btn" type="submit">
            Confirmar
        </button>
      </div>
    </form>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../layout/headIndex.php'); ?>
    <script src="../../js/vlrDatosUniversidad.js"></script>
</head>
<body>
    <?php 
        $estado = 'registrate'; 
        require_once('../menus/menuIndex.php'); 
        if(isset($_GET['datos'])){ $datos = unserialize($_GET['datos']);?>
    <div class="container col-sm-12 col-md-8 col-lg-6">
        <form class="FormIndex form-row" id="formCrear" action="#" method="post" onsubmit="return validarForm()" autocomplete="off">
            <!-- datos previos -->
            <div>
                <input type="hidden" name="primerNombre" value="<?php echo $datos['primerNombre']; ?>">
                <input type="hidden" name="segundoNombre" value="<?php echo $datos['segundoNombre']; ?>">
                <input type="hidden" name="apellidoPaterno" value="<?php echo $datos['apellidoPaterno']; ?>">
                <input type="hidden" name="apellidoMaterno" value="<?php echo $datos['apellidoMaterno']; ?>">
                <input type="hidden" name="fechNaci" value="<?php echo $datos['fechNaci']; ?>">
                <input type="hidden" name="genero" value="<?php echo $datos['genero']; ?>">
            </div>
            <div class="form-gruop col-lg-12">
                <input type="hidden" name="accion" value="crearCuenta">
                <h1 class="text-white Acme text-center">Registrate Ya!</h1>
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Universidad</label>
                <input class="Open-Sans txtCampo" type="text" name="txtUniversidad" id="txtUniversidad" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="Nombre de la universidad">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Facultad</label>
                <input class="Open-Sans txtCampo" type="text" name="txtFacultad" id="txtFacultad" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="Falcultad a la que pertenece">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Carrera</label>
                <input class="Open-Sans txtCampo" type="text" name="txtCarrera" id="txtCarrera" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="Carrera a la que pertenece">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Correo</label>
                <input class="Open-Sans txtCampo" type="text" name="txtCorreo" id="txtCorreo" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="Ingrese su correo">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Telefono</label>
                <input class="Open-Sans txtCampo" type="text" name="txtTelefono" id="txtTelefono" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="Ingrese du numero de telefono">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Contraseña</label>
                <input class="Open-Sans txtCampo" type="password" name="txtPass" id="txtPass" pattern="[A-Z]{1}[a-z]{5}[0-9]{2}" placeholder="Ejemplo: Aqwert12">
            </div>
            <div class="form-group">
                <button class="btn btn-success" id="btnCrear" type="submit">
                    <i class="fas fa-save"></i>
                    Crear Cuenta
                </button>
            </div>
        </form>
    </div>
    <?php } else {  header("Location: creandoCuenta.php"); } ?>
</body>
</html>
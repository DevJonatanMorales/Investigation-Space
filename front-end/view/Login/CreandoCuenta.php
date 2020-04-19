<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../layout/headIndex.php'); ?>
    <script src="../../js/vlrDatosPersonales.js"></script>
</head>
<body>
    <?php 
        $estado = 'registrate'; 
        require_once('../menus/menuIndex.php'); 
        if (isset($_GET['alert'])) {
            switch ($_GET['alert']) {
                case 'invalid':
                    echo("
                        <script>
                            Swal.fire({
                                icon: 'warning',           
                                title: 'Ocurrio un error, inenten de nuevo',
                                showConfirmButton: true
                            })
                        </script>"
                    );
                    break;
            }
        }
    ?>
    
    <div class="container col-sm-12 col-md-8 col-lg-6">
        <form class="FormIndex form-row" action="../../../back-end/models/creandoCuentaModel.php" method="post" onsubmit="return validarForm()" autocomplete="off">
            <div class="form-gruop col-lg-12">
                <input type="hidden" name="accion" value="creandoCuenta">
                <h1 class="text-white Acme text-center">Registrate Ya!</h1>
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Primer nombre</label>
                <input class="Open-Sans txtCampo" type="text" name="primerNombre" id="primerNombre" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="ingrese su primer nombre">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Segundo nombre</label>
                <input class="Open-Sans txtCampo" type="text" name="segundoNombre" id="segundoNombre" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="ingrese su segundo nombre">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Apellido paterno</label>
                <input class="Open-Sans txtCampo" type="text" name="apellidoPaterno" id="apellidoPaterno" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="ingrese su apellido paterno">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Apellido materno</label>
                <input class="Open-Sans txtCampo" type="text" name="apellidoMaterno" id="apellidoMaterno" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)" placeholder="ingrese su apellido materno">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Fecha de nacimiento</label>
                <input class="Open-Sans txtCampo" type="date" name="fechNaci" id="fechNaci" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
            </div>
            <div class="form-group col-lg-6">
                <label class="text-white Open-Sans" for="text">Genero</label>
                <select id="genero" name="genero" class="form-control">
                    <option value="0"> Seleccione </option>
                    <option value="Femenino"> Femenino </option>
                    <option value="Masculino"> Masculino </option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success" id="btn" type="submit">
                    Siguiente
                </button>
            </div>
        </form>
    </div>
</body>
</html>
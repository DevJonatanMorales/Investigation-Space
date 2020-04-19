<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('../layout/headIndex.php'); ?>
    <script src="../../js/vlrFormLogin.js"></script>
</head>
<body>
    <?php 
        $estado = 'iniciarSesion'; 
        require_once('../menus/menuIndex.php'); 
        if (isset($_GET['alert'])) {
            switch ($_GET['alert']) {
                case 'invalid':
                    echo("
                        <script>
                            Swal.fire({
                                icon: 'warning',           
                                title: 'Usuario o Contraseñas incorrectas',
                                showConfirmButton: true
                            })
                        </script>"
                    );
                    break;
                
                case 'valid': 
                    echo("
                        <script>
                            Swal.fire({
                                icon: 'warning',           
                                title: 'Usuario o Contraseñas correctas',
                                showConfirmButton: true
                            })
                        </script>"
                    );
                    break;
            }
        }
    ?>
    <div class="container col-sm-12 col-md-8 col-lg-4">
        <form id="formLogin" class="FormIndex" action="#" autocomplete="off">
            <div class="form-gruop">
                <h1 class="text-white Acme text-center">Iniciar Sesion</h1>
                <input type="hidden" name="accion" value="IniciarSesion">
            </div>
            <div class="form-group">
                <label class="text-white Open-Sans" for="text">Usuario</label>
                <input class="txtCampo" type="text" name="txtUser" id="txtUser" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
            </div>
            <div class="form-group">
                <label class="text-white Open-Sans" for="text">Contraseña</label>
                <input class="txtCampo" type="password" name="txtPass" id="txtPass" pattern="[A-Z]{1}[a-z]{5}[0-9]{2}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" id="btnIngresar" type="submit">
                    Ingresar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
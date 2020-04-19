<!DOCTYPE html>
<html lang="es">
    <head>
        <?php require_once('../layout/headMain.php'); ?>
        <script src="../../js/mostrarPerfil.js"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-dark text-white border-right" id="sidebar-wrapper">
                <?php require_once('../menus/menuPrincipal.php');?>
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
                        <button class="btnMenu btn" id="menu-toggle">
                            <span><i class="fas fa-ellipsis-v"></i></span>
                        </button>
                    </nav>
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between divMain">
                            <div class="section col-sm-7 col-md-7 col-lg-7 bg-white">
                                <div class='card col-lg-12'>
                                    <div class='card-header bg-success'>
                                        <h5 class='card-title text-white text-center'>
                                            Actualizar Datos Personales
                                        </h5>
                                    </div>
                                    <form id="FormCard" class='card-body' action="#" autocomplete="off">
                                        <div class='card-body'>
                                        <div class='row'>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Primer Nombre</label>
                                                <input type="hidden" name="accion" value="actualizarDatos">
                                                <input class='txtCampoForm' type='text' name="txtPrimerNombre" id='txtPrimerNombre' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Segundo Nombre</label>
                                                <input class='txtCampoForm' type='text' name="txtSegundoNombre" id='txtSegundoNombre' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Apellido Paterno</label>
                                                <input class='txtCampoForm' type='text' name="txtApellidoPaterno" id='txtApellidoPaterno' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Apellido Materno</label>
                                                <input class='txtCampoForm' type='text' name="txtApellidoMaterno" id='txtApellidoMaterno' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Fecha de Nacimiento</label>
                                                <input class='txtCampoForm' type='date' name="txtFechNaci" id='txtFechNaci' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Genero</label>
                                                <select name="txtGenero" id="txtGenero" class="form-control">
                                                    <option value="0"> Seleccione </option>
                                                    <option value="Femenino"> Femenino </option>
                                                    <option value="Masculino"> Masculino </option>
                                                </select>
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Universidad</label>
                                                <input class='txtCampoForm' type='text' name="txtUniversidad" id='txtUniversidad' value=""onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Facultad</label>
                                                <input class='txtCampoForm' type='text' name="txtfacultad" id='txtfacultad' value=""onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Carrera</label>
                                                <input class='txtCampoForm' type='text' name="txtCarrera" id='txtCarrera' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Correo</label>
                                                <input class='txtCampoForm' type='email' name="txtCorreo" id='txtCorreo' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <label for='text'>Telefono</label>
                                                <input class='txtCampoForm' type='text' name="txtTelefono" id='txtTelefono' value="" onblur="txtCampoEmpty(this)" onkeyup="txtCampoEmpty(this)">
                                            </div>
                                            <div class='form-group col-lg-6'>
                                                <button class='btn btn-primary my-4' id='btnActualizar' type='submi'>
                                                <i class='fas fa-user-edit'></i>
                                                    Actualizar Datos
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <?php require_once('../layout/sectionListAmigos.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        </script>
    </body>
</html>

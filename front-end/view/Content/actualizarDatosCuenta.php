<!DOCTYPE html>
<html lang="es">
    <head>
        <?php require_once('../layout/headMain.php'); ?>
        <script src="../../js/mostrarCredenciales.js"></script>
        <script src="../../js/showPhoto.js"></script>
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
                                            Actualizar Contraseña
                                        </h5>
                                    </div>
                                    <form id="FormCredenciales" class='card-body' action="#" enctype="multipart/form-data" method="post" autocomplete="off">
                                        <div class='card-body'>
                                        <div class='row'>
                                            <div class='form-group col-lg-12'>
                                                <label for='text'>Nueva Contraseña</label>
                                                <input type="hidden" name="accion">
                                                <input class='txtCampoForm' type='password' name="txtNewClave" id='txtNewClave' value="" pattern="[A-Z]{1}[a-z]{5}[0-9]{2}" placeholder="" onblur="campoVlr()" onkeyup="campoVlr()">
                                            </div>
                                            <div class='form-group col-lg-12'>
                                                <label for='text'>Confirmar Contraseña</label>
                                                <input type="hidden" name="txtClave" id="txtClave" value="">
                                                <input class='txtCampoForm' type='password' name="txtConfirClave" id='txtConfirClave' value="" pattern="[A-Z]{1}[a-z]{5}[0-9]{2}" onblur="campoVlr()" onkeyup="campoVlr()">
                                            </div>
                                            <div class='form-group col-lg-12'>
                                                <label for='text'>Contraseña Actual</label>
                                                <input class='txtCampoForm' type='password' name="txtClaveActual" id='txtClaveActual' value="" pattern="[A-Z]{1}[a-z]{5}[0-9]{2}" onblur="campoVlr()" onkeyup="campoVlr()">
                                            </div>
                                            <div class='form-group col-lg-12'>
                                                <button class='btn btn-primary my-4' id='btnActualizar' type='submi'>
                                                <i class="fas fa-user-cog"></i>
                                                    Actualizar
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

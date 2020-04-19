<!DOCTYPE html>
<html lang="es">
    <head>
        <?php require_once('../layout/headMain.php'); ?>
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
                                          <i class="fas fa-camera"></i>
                                          Actualizar Foto
                                        </h5>
                                    </div>
                                    <form class='card-body' action="../../../back-end/models/actualizarFotoModel.php" enctype="multipart/form-data" method="post" autocomplete="off" onsubmit="return emptyFoto()">
                                        <div class='card-body'>
                                            <div class='row'>
                                            <input type="hidden" name="accion" value="actualizar">
                                                <div class='form-group col-lg-12 text-center'>
                                                    <label for="text">Vista Previa</label>
                                                </div>
                                                <div class='form-group col-lg-12 text-center'>
                                                    <img id="blah" class="rounded prevPhoto" src="" alt="">
                                                </div>  
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon03">
                                                            Subir
                                                        </button>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" name="foto" class="custom-file-input" id="txtFile">
                                                        <label class="custom-file-label" for="text" id="txtDescripcion">
                                                            Elija el archivo
                                                        </label>
                                                    </div>
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

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php require_once('../layout/headMain.php'); ?>
        <script src="../../js/main.js"></script>
    </head>
    <body>

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-dark text-white border-right" id="sidebar-wrapper">
                <?php require_once('../menus/menuPrincipal.php'); ?>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">

                    <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
                        <button class="btnMenu btn" id="menu-toggle">
                            <span><i class="fas fa-ellipsis-v"></i></span>
                        </button>

                    </nav>

                    <div class="container-fluid">
                        <div class="d-flex justify-content-between divMain">
                            <input type="hidden" id="publicacionId" >
                            <div id="publicaciones" class="section col-sm-7 col-md-7 col-lg-7">

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
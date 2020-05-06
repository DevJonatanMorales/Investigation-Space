<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once('../layout/headMain.php'); ?>
  <script src="../../js/misPublicaciones.js"></script>
</head>
<body>
  <div class="d-flex" id="wrapper"> <!-- Sidebar -->
    <div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <!-- Menu lateral -->
      <?php require_once('../menus/menuPrincipal.php');?>
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <!-- Barrar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
            <button class="btnMenu btn" id="menu-toggle">
                <span><i class="fas fa-ellipsis-v"></i></span>
            </button>
        </nav>

        <div class="container-fluid">
          <div class="d-flex justify-content-between divMain">
            <section class="container bg-white col-sm-7 col-md-7 ">
              <nav class="navbar navbar-light bg-success">
                <a class="navbar-brand Oswald text-white" href="#">Publicaciones</a>
                <form class="form-inline">
                  <input class="form-control mr-sm-2 Open-Sans" type="text" placeholder="Buscar">
                  <button class="btn btn-outline-light my-2 my-sm-0 Open-Sans" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </form>
              </nav>
            </section>
            
            <!-- nueva publicaciones -->
            <?php //require_once('../layout/newPublicacion.php'); ?>
          </div>
        </div>
      </div>
    </div>
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
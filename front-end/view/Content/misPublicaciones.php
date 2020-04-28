<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once('../layout/headMain.php'); ?>
  <script src=""></script>
</head>
<body>
  <div class="d-flex" id="wrapper">
    <div class="bg-dark text-white border-right" id="sidebar-wrapper">
      <!-- Sidebar -->
      <?php require_once('../menus/menuPrincipal.php');?>
      <!-- Page Content -->
      <div id="page-content-wrapper">
        <!-- barrar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
          <button class="btnMenu btn" id="menu-toggle">
              <span><i class="fas fa-ellipsis-v"></i></span>
          </button>
        </nav>
        <section class="container bg-white col-md-11">
          <div class='card-header bg-success'>
            <h5 class='card-title text-white text-center'>
              Publicaciones
            </h5>
          </div>

          <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button>
          </nav>
        </section>
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
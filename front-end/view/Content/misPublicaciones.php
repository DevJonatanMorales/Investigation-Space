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
        <h1>Pag. Publicaciones</h1>
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
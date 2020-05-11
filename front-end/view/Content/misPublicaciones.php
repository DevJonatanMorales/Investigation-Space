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
            <section class="container bg-white col-sm-12 col-md-12 ">
              <nav class="navbar navbar-light bg-success">
                <a class="navbar-brand text-white Oswald" href="#">Mis Publicaciones</a>
                <div class="form-inline">
                  <input class="form-control mr-sm-2 Open-Sans" id="txtBuscar" type="text" placeholder="Buscar">
                  <button class="btn btn-outline-light my-2 my-sm-0 Open-Sans" type="submit">
                    <i class="fas fa-plus"></i>
                    Nueva Publicación
                  </button>
                </div>
              </nav>

              <div id="publicaciones" class="form-row py-1">

              </div>
            </section>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ventana modal -->
  <div class="modal fade bd-example-modal-xl" id="myModal" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

      </div>
    </div>
  </div>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
    //modal
    $(function() {
    $(document).on('click', 'button[type="submit"]', function(event) {//al hacer click en el boton
    console.log('click');

        $('.modal-content').load("newPublicacion.php",function(){//llamo al archivo q tiene el contenido
            $('#myModal').modal({show:true});//cargo la ventana modal
        });
      });
    });
  </script>
</body>
</html>
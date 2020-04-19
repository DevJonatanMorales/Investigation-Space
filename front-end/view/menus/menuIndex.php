
<nav class="navbar navbar-expand-lg navbar-light degradado">
    <a class="navbar-brand" href="#">
        <img src="../../img/InvetigationSpace.png" width="220" height="35" alt="">
    </a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white" width="35" height="35">
            <i class="fas fa-bars"></i>
        </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link Open-Sans text-white <?php echo $estado == "inicio"? "active bodreButton": '' ?>" href="index.php">Inicio</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link Open-Sans text-white <?php echo $estado == "iniciarSesion"? "active bodreButton": '' ?>" href="IniciarSesion.php">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link Open-Sans text-white <?php echo $estado == "registrate"? "active bodreButton": '' ?>" href="creandoCuenta.php">Registrate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link Open-Sans text-white <?php echo $estado == "clave"? "active bodreButton": '' ?>" href="RecuperarClave.php">Recuperar Cuenta</a>
            </li>
        </ul>
    </div>
</nav>
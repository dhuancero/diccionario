<!-- Botón Inicio Sesión: -->
<!-- <section class="login"> -->
<?php if (isset($sesicion_username)) { ?>
  <section class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" aria-current="page" href="#"></a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $sesicion_username; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Configuración</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="./pages/insertar-palabra.php">Insertar palabra</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" method="post" action="./components/cerrarSesion.php">
          <button class="btn btn-sm btn-danger text-light" name="cerrarSesion" type="submit">Cerrar Sesión</button>
        </form>
      </div>
    </div>
  </section>
<?php } else { ?>
  <form method="post" action="./pages/login.php" class="form">
    <div>
      <input type="submit" name="inicioSesion" class="btn btn-sm btn-primary" value="Iniciar Sesion">
    </div>
  </form>
<?php
}
?>
<!-- </section> -->
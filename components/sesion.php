<!-- Botón Inicio Sesión: -->
<!-- <section class="login"> -->
<?php if (isset($sesicion_username)) {
  $rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
?>
  <section class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <ul class="navbar-nav me-auto border-start">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $sesicion_username; ?>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="<?php echo $rutaLocal ?>/admin">Configuración</a>
            </li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search" method="post" action="<?php echo $rutaLocal ?>/components/cerrarSesion.php">
        <button class="btn btn-sm btn-danger text-light" name="cerrarSesion" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </section>
<?php } else { ?>
  <form method="post" action="<?php echo $rutaLocal ?>/admin/login.php" class="form">
    <div>
      <input type="submit" name="inicioSesion" class="btn btn-sm btn-primary" value="Iniciar Sesion">
    </div>
  </form>
<?php
}
?>
<!-- </section> -->
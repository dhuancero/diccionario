<!-- Botón Inicio Sesión: -->
<!-- <section class="login"> -->
<?php if (isset($sesicion_username)) {
  $rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario/admin";
?>
  <section class="navbar navbar-expand-lg bg-dark">
    <ul class="navbar-nav me-auto border-start">
      <li class="nav-item text-light mx-2 ">
        <?php echo $sesicion_username ?>
      </li>
    </ul>
    <form class="d-flex" role="search" method="post" action="<?php echo $rutaLocal ?>/components/cerrarSesion.php">
      <button class="btn btn-sm btn-danger text-light" name="cerrarSesion" type="submit">Cerrar Sesión</button>
    </form>
  </section>
<?php } else { ?>
  <form method="post" action="<?php echo $rutaLocal ?>/login.php" class="form">
    <div>
      <input type="submit" name="inicioSesion" class="btn btn-sm btn-primary" value="Iniciar Sesion">
    </div>
  </form>
<?php
}
?>
<header>
  <nav class="navbar navbar-dark bg-dark ">
    <div class="container-fluid ">
      <a class="navbar-brand" href="<?php echo $rutaLocal ?>">MI PRIMER DICCIONARIO | administrador</a>

      <nav class="nav align-items-center ">
        <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/seccion/editaPersonaje.php">Editar Personajes</a>
        <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/seccion/insertar-palabra.php">Insetar palabra</a>
        <a class="nav-link text-light" href="http://localhost/diccionario" target="_blank">Ver Diccionario</a>
        <?php include_once("sesion.php"); ?>
      </nav>
      <!-- Aquí va inicio de sesion -->
    </div>
  </nav>
</header>
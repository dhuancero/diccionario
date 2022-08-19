<header>
  <nav class="navbar navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo $rutaLocal ?>">MI PRIMER DICCIONARIO</a>
      <nav class="nav align-items-center">
        <a class="nav-link text-light" href="<?php echo $rutaLocal ?>">Inicio</a>
        <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/lista-personajes.php">Personajes</a>
        <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/lista-palabras.php">Palabras</a>

        <?php include_once("sesion.php"); ?>
      </nav>
    </div>
  </nav>
</header>
<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
require_once("../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<?php
include_once("../components/head.php");
cabecera("Administrar");
?>

<body>
  <?php
  // establecemos la conexión
  $db = conexion();
  $rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
  ?>

  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="<?php echo $rutaLocal ?>">MI PRIMER DICCIONARIO</a>
        <!-- <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/pages/personajes.php">Personajes</a>
          </li>
        </ul> -->

        <?php include_once("../components/sesion.php"); ?>
        <!-- Aquí va inicio de sesion -->
      </div>
    </nav>
  </header>
  <!-- MAIN -->
  <main class="container">
    <div class="row text-center my-4">
      <div class="col-md-5 border border-1">Menú Usuario</div>
      <div class="col-md-7 border border-1">Apartados usuario</div>
    </div>

  </main>

</body>

</html>
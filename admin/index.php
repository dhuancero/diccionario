<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
} else {
  header("Location:login.php");
}
require_once("../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<?php
include_once("./components/head.php");
cabecera("Administrar Diccionario");
?>

<body>
  <?php
  // establecemos la conexión
  $db = conexion();
  $rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario/admin";
  ?>

  <!-- HEADER -->

  <?php include_once("./components/header.php"); ?>

  <!-- MAIN -->
  <main class="container">
    <div class="row text-center my-4">
      <div class="col-md-5 border border-1">Menú Usuario</div>
      <div class="col-md-7 border border-1">Apartados usuario</div>
    </div>

  </main>

</body>

</html>
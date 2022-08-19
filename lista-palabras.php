<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
include_once("./db/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<?php
include_once("./components/head.php");
cabecera("Palabras");
?>

<body>
  <!-- HEADER -->
  <?php
  include_once("./components/header.php");
  ?>
  <!-- HEADER FIN -->
  <!-- MAIN INICIO -->
  <main class="container">
    Muestra la lista de las palabra ordenadas.

  </main>

</body>

</html>
<?php

session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
include_once "../components/head.php";
require_once "../config/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<?php
cabecera("Editar Personaje");
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario/admin";

?>

<body>
  <?php
  include_once("../components/header.php")
  ?>
  <main class="container">
    <?php
    $db = conexion();


    ?>

  </main>

</body>

</html>
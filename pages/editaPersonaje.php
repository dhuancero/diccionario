<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
include_once "../components/head.php";
require_once "../db/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<?php
cabecera("Editar Personaje");
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";

?>

<body>
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="<?php echo $rutaLocal ?>/">MI PRIMER DICCIONARIO</a>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?php echo $rutaLocal ?>/pages/personajes.php">Personajes</a>
          </li>
        </ul>

        <?php include_once("../components/sesion.php"); ?>
        <!-- Aquí va inicio de sesion -->
      </div>
    </nav>
  </header>
  <main class="container">
    <?php
    $db = conexion();


    ?>

  </main>

</body>

</html>
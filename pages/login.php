<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
include_once "../components/head.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php
cabecera("Login");
?>

<body>
  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-dark bg-dark ">
      <div class="container-fluid ">
        <a class="navbar-brand" href="./">MI PRIMER DICCIONARIO</a>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="../">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="./personajes.php">Personajes</a>
          </li>
        </ul>

        <?php include_once "../components/sesion.php"; ?>
        <!-- Aquí va inicio de sesion -->
      </div>
    </nav>
  </header>
  <!-- HEADER FIN -->

  <main class="container">
    <?php
    if (isset($_POST["inicioSesion"])) {
      if (isset($sesicion_username)) {
        echo "iniciaste sesion:" . $sesicion_username;
      } else {
    ?>
        <form action="../db/esLogin.php" method="post" class="formLogin form">
          <label for="user" class="form-label"> USUARIO:
            <input type="text" class="form-control" name="user" id="user">
          </label>
          <label for="pass" class="form-label"> PASSWORD:
            <input type="password" class="form-control" name="pass" id="pass">
          </label>
          <div class="btnAcceder">
            <input type="submit" value="ACCEDER" name="btnAcceder" class="btn btn-primary">
            <input type="submit" value="CREAR USUARIO" name="btnCrear" class="btn btn-danger">
          </div>
        </form>
    <?php
      }
    } else {
      header("Location: ../index.php");
    }
    ?>

  </main>

</body>

</html>
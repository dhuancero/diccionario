<!DOCTYPE html>
<html lang="es">
<?php
include_once "../components/head.php";
cabecera("Login");
?>

<body>
  <main class="container">
    <?php
    if (isset($_POST["inicioSesion"])) {
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
    } else {
      header("Location: ../index.php");
    }
    ?>

  </main>

</body>

</html>
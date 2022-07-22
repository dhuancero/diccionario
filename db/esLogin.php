<!DOCTYPE html>
<html lang="en">

<?php
include_once "../components/head.php";
cabecera("Registro-Login");
?>

<body>
  <main class="container">
    <?php
    if (isset($_POST["btnAcceder"])) {
      echo "Acceder";
      $user = $_POST["user"];
      $pass = $_POST["pass"];
    } else if (isset($_POST["btnCrear"])) {
    ?>
      <form action="esRegistar.php" method="post" class="formRegis">
        <label for="name">
          Nombre:
          <input type="text" name="name" id="name">
        </label>
        <label for="email">
          Email
          <input type="email" name="email" id="email">
        </label>
        <label for="userName">
          Nombre de Usuario:
          <input type="text" name="userName" id="userName">
        </label>
        <label for="password">
          Contraseña:
          <input type="password" name="password" id="password">
        </label>
        <label for="repass">
          Repetir contraseña:
          <input type="password" name="re-pass" id="re-pass">
        </label>
        <div>
          <input type="submit" class="btn btn-primary" name="registrar" value="REGISTRAR">
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
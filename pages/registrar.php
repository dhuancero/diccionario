<?php
session_start();
include_once "../components/head.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php
cabecera("Registrar");
?>

<body>
  <!-- HEADER -->
  <?php include_once "../components/header.php"; ?>
  <!-- HEADER FIN -->

  <form action="../db/esRegistar.php" method="post" class="formRegis form">
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
</body>

</html>
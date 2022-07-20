<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio Sesion</title>
</head>
<body>
<main class="container">
  <?php 
  if (isset($_POST["inicioSesion"])) {
  ?>
   <form action="../db/esLogin.php" method="post" class="formLogin">
        <label for="user"> USUARIO:
          <input type="text" name="user" id="user">
        </label>
        <label for="pass"> PASSWORD:
          <input type="password" name="pass" id="pass">
        </label>
        <div class="btnAcceder">
          <input type="submit" value="ACCEDER" name="btnAcceder">
          <input type="submit" value="CREAR USUARIO" name="btnCrear">
        </div>
    </form>
  <?php
  }
  else{
    header("Location: ../index.php");
  }
  ?>

</main>  

</body>
</html>
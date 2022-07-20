<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>esLogin</title>
</head>
<body>
<main class="container">
<?php
  if(isset($_POST["btnAcceder"])){
    echo "Acceder";
    $user = $_POST["user"];
    $pass = $_POST["pass"];

  }
  else if(isset($_POST["btnCrear"])){
?>
  <form action="esRegistar.php" method="post">
    <label for="name">
      <input type="text" name="name" id="name">
    </label>
    <label for="email">
      <input type="email" name="email" id="email">
    </label>
    <label for="userName">
      <input type="text" name="userName" id="userName">
    </label>
    <label for="password">
      <input type="password" name="password" id="password">
    </label>
    <label for="name">
      <input type="password" name="re-pass" id="re-pass">
    </label>
    <div>
      <input type="submit" name="registrar" value="REGISTRAR">
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
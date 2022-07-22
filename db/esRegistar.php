<?php
session_start();
require "conexion.php";
if (isset($_POST["registrar"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["userName"];
  $pass = $_POST["password"];
  $rePass = $_POST["re-pass"];

  if ($pass === $rePass) {
    echo $pass;
    echo $rePass;
    $passCifrado = password_hash($pass, PASSWORD_DEFAULT, array('cost' => 12));
  }

  $conn = conexion();
  // Preparar la consulta.
  $sql = "INSERT INTO `usuarios`(`nombre`, `email`, `username`, `password`, `re-password`) VALUES (?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssss', $name, $email, $username, $passCifrado, $rePass);
  $stmt->execute();
  if ($stmt) {
    echo "Todo ha salido bien";
    $_SESSION["username"] = $username;
    header("Location: ../index.php?registrado");
  } else {
    echo "No se ha podido insertar registro";
  }

  $stmt->close();
  $db->close();
}

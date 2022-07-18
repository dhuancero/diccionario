<?php 
  function conexion () {
    $serverName = 'localhost';
    $db = 'diccionario';
    $userName = 'david';
    $password = 'Davi_1986';

    // Creamos una conexión:
    $conn = mysqli_connect($serverName, $userName, $password);

    if(!$conn){
      die("<p class='fallo'>Fallo de conexión: ". mysqli_connect_error(). "</p>");
    }
    mysqli_select_db($conn, $db);

    return $conn;
  }
?>
<?php
require_once "db/conexion.php";
if (!empty($_GET['id'])) {
  $db = conexion();
  $id = $_GET['id'];
  echo $id;
  //Extraer imagen de la BD mediante GET
  $result = $db->query("SELECT imagen FROM palabras WHERE id = $id");
  if ($result->num_rows > 0) {
    $imgDatos = $result->fetch_assoc();

    //Mostrar Imagen
    header("Content-type: image/jpg");
    echo $imgDatos['imagen'];
  } else {
    echo 'Imagen no existe...';
  }
  echo $imgDatos['imagen'];
  echo $imgDatos;
}

<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";
include_once("./db/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<?php
include_once("./components/head.php");
cabecera("Palabras");
?>

<body>
  <!-- HEADER -->
  <?php
  include_once("./components/header.php");
  ?>
  <!-- HEADER FIN -->
  <!-- MAIN INICIO -->
  <main class="container">
    <?php
    $db = conexion();
    if (isset($_GET['id'])) {
      $db = conexion();
      if (!is_numeric($_GET['id'])) {
        exit("No es un número");
      }
      $idPersonaje = $_GET['id'];
      //!-------------------------------------------------------------
      //! Obtenemos nombre del personaje.
      //!-------------------------------------------------------------
      $sqlPersonaje = "SELECT * FROM personaje WHERE id = ?";
      $sentencia = $db->prepare($sqlPersonaje);
      $sentencia->bind_param("i", intval($idPersonaje));
      $sentencia->execute();
      $resulPersonaje = $sentencia->get_result();
      # Obtenemos solo una fila, que será la palabra a mostrar
      $personajeDatos = $resulPersonaje->fetch_assoc();
      if (!$personajeDatos) {
        exit("No hay resultados para esa palabra");
      }
    ?>
      <div class="row my-4 ">
        <div class="col-md-5 align-items-center">
          <h2 class="text-center my-4 text-danger text-uppercase"><?php echo $personajeDatos['nombre'] ?></h2>
        </div>
        <div class="col-md-5 align-items-center">
          <?php if (isset($person)) {
          } ?>
          <img src="<?php echo $rutaLocal ?>/img/avatar/avatar2.jpg<?php $personajeDatos['nombre'] ?>" class="card-img-top" height=300 alt="Aquí va la imagen del personaje">
        </div>
      </div>
      <hr>

      <!-- !------------------------------------------------------------- -->
      <!-- Obtenemos las palabras relacionadas con los personajes. -->
      <!--------------------------------------------------------------- -->
      <div class="container mx-auto mt-4">
        <div class="row">
          <?php
          $sqlPalabra = "SELECT W.id, W.palabra, W.imagen, W.descripcion FROM palabras W INNER JOIN relacion R ON W.id = R.id_palabra WHERE R.id_personaje = $idPersonaje";
          $resultado = $db->query($sqlPalabra);
          $personaje = $resultado->fetch_all(MYSQLI_ASSOC);
          foreach ($personaje as $person) {
          ?>
            <div class="col-md-4 mb-3">
              <div class="card" style="width: 18rem;">
                <a href="#">
                  <img src="<?php echo $rutaLocal ?>/img/<?php echo $person['imagen'] ?>" class="card-img-top" alt="Aquí va la imagen del personaje">
                </a>
                <div class="card-body text-center">
                  <h3 class="card-title pb-2 title-personaje"><?php echo $person['palabra'] ?></h3>
                  <!-- <a href="palabras.php?id=<?php echo $personaje['id'] ?>" class="btn btn-sm text-center btn-outline-danger mr-2">Ver Palabras</a> -->
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    <?php

      $db->close();
    } else {
      exit(header("Location: " . $rutaLocal));
    }
    ?>

  </main>

</body>

</html>
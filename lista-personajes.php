<?php
session_start();
if (isset($_SESSION['username'])) {
  $sesicion_username = $_SESSION['username'];
}
include_once "./components/head.php";
require_once "./db/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<?php
cabecera("Personajes");
$rutaLocal = "http://" . $_SERVER["HTTP_HOST"] . "/diccionario";

?>

<body>
  <!-- HEADER -->
  <?php
  include_once("./components/header.php");
  ?>
  <!-- HEADER FIN -->
  <main class="container">
    <h1 class="text-center my-4">Personajes</h1>
    <div class="container mx-auto mt-4">
      <div class="row">
        <?php
        $conn = conexion();
        $sql = "SELECT * FROM personaje";
        $resultado = $conn->query($sql);
        $personajes = $resultado->fetch_all(MYSQLI_ASSOC);

        foreach ($personajes as $personaje) {
        ?>
          <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
              <a href="#">
                <img src="https://i.imgur.com/ZTkt4I5.jpg" class="card-img-top" alt="Aquí va la imagen del personaje">
              </a>
              <div class="card-body text-center">
                <h5 class="card-title pb-2 title-personaje"><?php echo $personaje['nombre'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php $personaje['id'] ?></h6>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <a href="ver-personaje.php?id=<?php echo $personaje['id'] ?>" class="btn btn-sm text-center btn-outline-danger mr-2">Ver Palabras</a>
              </div>
            </div>
          </div>
        <?php
        } ?>
      </div>
    </div>
  </main>

</body>

</html>
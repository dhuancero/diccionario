<header>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./">MI PRIMER DICCIONARIO</a>
      <ul class="nav justify-content-end nav-fill">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./pages/personajes.php">Personajes</a>
        </li>
      </ul>

      <!-- Botón Inicio Sesión: -->
      <section class="login">
        <?php if (isset($sesicion_username)) { ?>
          <section class="registradoOk">
            <h3><?php echo $sesicion_username; ?></h3>
            <form method="post" action="./components/cerrarSesion.php">
              <input type="submit" name="cerrarSesion" value="Cerrar Sesion">
            </form>
          </section>
        <?php } else { ?>
          <form method="post" action="./pages/login.php" class="form">
            <div>
              <input type="submit" name="inicioSesion" class="btn btn-primary" value="Iniciar Sesion">
            </div>
          </form>
        <?php
        }
        ?>
      </section>

    </div>
    </div>
  </nav>
</header>
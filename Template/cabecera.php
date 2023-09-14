<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title> 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./Style/stylecabecera.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg b">
  <div class="container">
    <a class="navbar-brand" href="./index.php">
      <img src="./media/logo.png" alt="Logo" class="logo-img">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i> <!-- Reemplaza con el ícono de FontAwesome que desees -->
    </button>


    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="./productos.php">PRODUCTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./sobre_nosotros.php">SOBRE NOSOTROS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./galeria.php">GALERIA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./contactanos.php">CONTACTANOS</a>
        </li>
      </ul>

      <?php
        session_start();

        if (isset($_SESSION['usuario'])) {
          $usuario = $_SESSION['usuario'];
      ?>

      <ul class="navbar-nav ml-auto">
        <li class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $usuario; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="./Configuraciones/logout.php">CERRAR SESIÓN</a>
          </div>
        </li>
      </ul>

      <?php
        } else {
      ?>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="./login.php">INICIAR SESIÓN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./registro.php">REGISTRARSE</a>
        </li>
      </ul>

      <?php
        }
      ?>
    </div>
  </div>
</nav>

<body>
<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./css/stylenav.css">
  <link rel="stylesheet" href="./css/stylefon.css">

</head>

<body>

  <?php include('marquee.php'); ?>

  <nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./resources/logo.png" alt="" width="300" height="80" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <a class="nav-link" href="javascript:void(0);" onclick="scrollToHeroImage()">Inicio</a>
          <a class="nav-link" href="javascript:void(0);" onclick="scrollToCardback()">¿Quiénes Somos?</a>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Eventos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./vista/calendario.php">Calendario</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Incripciones
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./vista/comment.php">Módulos</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Contactos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="https://www.facebook.com"> <i class="bi bi-facebook"></i> Facebook </a>
              </li>
              <li><a class="dropdown-item" href="https://www.instagram.com"> <i class="bi bi-instagram"></i>
                  Instagram</a></li>
            </ul>
          </li>
        </ul>


        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <?php
            if (isset($_SESSION['user_name'])) {

              $dashboardLink = '';


              switch ($_SESSION['user_role']) {
                case 'admin':
                  $dashboardLink = 'dashboard/admin.php';
                  break;
                case 'editor':
                  $dashboardLink = 'dashboard/editor.php';
                  break;
                case 'usuario':
                  $dashboardLink = 'dashboard/user.php';
                  break;
                default:
                  $dashboardLink = '#';
                  break;
              }

              echo '<a class="nav-link" href="' . $dashboardLink . '">' . $_SESSION['user_name'] . '</a>';
            } else {
              echo '<a class="nav-link" href="./vista/login.php">Iniciar sesión <img src="./resources/user.png" width="20" height="20" class="me-1"></a>';
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>

<script src="js/anim_nav.js"></script>
<script src="js/scroll.js"></script>

</html>
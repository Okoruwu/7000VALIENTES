<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/stlog.css">

  <title>Iniciar sesión</title>

</head>

<body>

<div class="cardback">

<div class="login-form">

<div class="conlog-img"> </div>

<div class="con-curve">
        <img src="../resources/curva.png" alt="curva" class="img-curve">
</div>

<p class="p-white">EL SEÑOR TE PROTEGERÁ,</p>
<p class="p-white">DE TODO MAL, PROTEGERA TU VIDA.</p>

<div class="con-nub">
        <img src="../resources/nubes.png" alt="nube" class="img-nub">
</div>

<h1>Bienvenidos</h1>

  <form action="./bd/testimonio.php" method="POST">

    <input type="text" id="user" name="user" placeholder="Usuario" required>

    <input type="text" id="pass" name="contfra" placeholder="Contraseña" required>

    <div class="btn-send">
      <button type="submit">Iniciar Sesión</button>
    </div>

    </form>
</div>

</div>    

          <?php
          // depuración 
          // session_start();
          // if (isset($_SESSION['error'])) {
          //   echo "<script>console.error('PHP Error: " . addslashes($_SESSION['error']) . "');</script>";
          //   unset($_SESSION['error']);
          // }
          
          // if (isset($_SESSION['success'])) {
          //   echo "<script>console.log('PHP Success: " . addslashes($_SESSION['success']) . "');</script>";
          //   unset($_SESSION['success']);
          // }
          ?>


</body>

<script src="../js/log.js"></script>

</html>
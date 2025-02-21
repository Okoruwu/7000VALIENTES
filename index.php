<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>

  <title>700VALIENTES</title>
  <link rel="stylesheet" href="./css/styleind.css">
  <link rel="stylesheet" href="./css/stylefon.css">
  <link rel="stylesheet" href="./css/stylenav.css">
  <link rel="stylesheet" href="./css/load.css">
  <link rel="stylesheet" href="./css/styleform.css">

</head>

<body>

  <!-- Pantalla de Cargando -->
  <div id="loading">
    <div class="spinner"></div>
  </div>
  <?php
  include_once './modulos/nav.php';
  ?>


  <div class="hero-image">
    <div class="text-overlay">
      <h1>Donde dios transforma</h1>
      <h1>Vidas</h1>

    </div>
  </div>



  <div class="cardback">

    <h3>¿Quiénes somos?</h3>

    <div class="container">
      <div class="box">
        <span></span>
        <div class="content">
          <h2 style="text-align: center;">Misión</h2>
          <p style="text-align: justify;">Inspirar y tranformar vidas a través de valores y principios.</p>
        </div>
      </div>
      <div class="box">
        <span></span>
        <div class="content">
          <h2 style="text-align: center;">Visión</h2>
          <p style="text-align: justify;">Establecer una Feria Aeroespacial, de Seguridad y Defensa sustentable, con
            prestigio y liderazgo en la comunidad aeronáutica mundial,
            que promueva.</p>
        </div>
      </div>

      <div class="box">
        <span></span>
        <div class="content">
          <h2 style="text-align: center;">Objetivos</h2>
          <p style="text-align: justify;">Establecer una Feria Aeroespacial, de Seguridad y Defensa sustentable, con
            prestigio y liderazgo en la comunidad aeronáutica mundial,
            que promueva.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="cardback">
    <h3>Escribe tu testimonio</h3>
    <div class="testimonio-form">
      <p class="p-white">Contemos las historias que inspiren a otras personas seguir creyendo por su milagro.</p>
      <p class="p-orange">¡Nosotros lo compartiremos para que juntos demos testimonio de nuestro padre bueno y
        misericordioso!</p>

      <form action="./bd/testimonio.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" required>

        <label for="pais">País</label>
        <input type="text" id="pais" name="pais" required>

        <label for="testimonio">Escribe tu testimonio</label>
        <textarea id="testimonio" name="testimonio" required></textarea>

        <div class="btn-send">
          <button type="submit">Enviar Testimonio</button>
        </div>
      </form>
    </div>
  </div>



  <script src="./js/load.js"></script>
  <script src="./js/scroll.js"></script>


  <?php
  include_once './modulos/nav.php';

  include './modulos/footer.php';
  ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>

  <title>700VALIENTES</title>
  <link rel="stylesheet" href="./css/stylenav.css">
  <link rel="stylesheet" href="./css/load.css">

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
      <h1>DONDE DIOS TRANSFORMA</h1>

      <h2>VIDAS</h2>
    </div>
  </div>

  <div class="con-curve">
    <img src="./resources/curva.png" alt="curva" class="img-curve">
  </div>

  <div class="cardback">

    <h3>¿Quiénes somos?</h3>

    <div class="container">
      <div class="box">
        <span></span>
        <div class="content">
          <h2 style="text-align: center;">Visión</h2>
          <p style="text-align: justify;">"Ser un remanente fiel transformador por Dios,
            comprometido a llevar el evangelio de Cristo con valentia, impactando nuestra
            comunidad y más alla de nuestras fronteras con su amor y proposito."</p>
        </div>
      </div>
      <div class="box">
        <span></span>
        <div class="content">
          <h2 style="text-align: center;">Misión</h2>
          <p style="text-align: justify;">"Evangelizar, discipular y servir con estrategias
            creativas, guiando a las personas a ser transformadas
            en Cristo, a permanecer en la fe y a liderar para la gloria de Dios."</p>
        </div>
      </div>

      <div class="box">
        <span></span>
        <div class="content">
          <h2 style="text-align: center;">Objetivos</h2>
          <p style="text-align: justify;">"Ser un remanente fiel transformador por Dios,
            comprometido a llevar el evangelio de Cristo con valentia, impactando nuestra
            comunidad y más alla de nuestras fronteras con su amor y proposito.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="con-curve">
    <img src="./resources/curva.png" alt="curva" class="img-curve">
  </div>

  <div class="cardback">

    <h3>Escribe tu testimonio</h3>

    <div class="testimonio-form">

      <p class="p-white"> Contemos las historias que inspiren a otras personas seguir creyendo por su milagro.
        Tu testimonio las pueden llenar de fe, compartelo.</p>

      <p class="p-whit"> Si has recibido un milagro en cualquier, area de tu vida</p>
      <p class="p-orange">¡Nosotros lo compartiremos para que juntos
        demos testimonio de nuestro padre bueno y misericordioso!</p>

      <form action="./bd/testimonio.php" method="POST">
        <input type="text" id="nombre" name="nombre" required placeholder="Nombre">

        <input type="email" id="email" name="email" required placeholder="Email">

        <input type="text" id="ciudad" name="ciudad" required placeholder="Ciudad">

        <input type="text" id="pais" name="pais" required placeholder="País">

        <textarea id="testimonio" name="testimonio" required placeholder="Escribe tu testimonio"></textarea>

        <div class="btn-send">
          <button type="submit">Enviar Testimonio</button>
        </div>
      </form>
    </div>

  </div>

  <script src="./js/load.js"></script>

  <?php
  include_once './modulos/nav.php';

  include './modulos/footer.php';
  ?>

</body>

</html>
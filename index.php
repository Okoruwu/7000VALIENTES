<?php
require_once 'bd/Database.php';

$query = "SELECT nombre, testimonio FROM test";

$conn = Database::getConnection();

$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <link rel="icon" type="image/png" href="./resources/iconpag.png">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

  <title>700VALIENTES</title>
  <link rel="stylesheet" href="./css/styleind.css">
  <link rel="stylesheet" href="./css/stylefon.css">
  <link rel="stylesheet" href="./css/stylenav.css">
  <link rel="stylesheet" href="./css/styleform.css">
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

  <div class="con-curve1">
    <img src="./resources/curva.png" alt="curva" class="img-curve">
  </div>

    <h3 class="quien">¿Quiénes somos?</h3>

    <div class="container">
    <div class="con-visi">
          <h2 class="Toran">Visión</h2>
          <p class="p-mvwhi">"Ser un remanente fiel transformador por Dios,
            comprometido a llevar el evangelio de Cristo con valentia, impactando nuestra
            comunidad y más alla de nuestras fronteras con su amor y proposito."</p>
        </div>
   
        <div class="con-misi">        
          <h2 class="Toran">Misión</h2>
          <p class="p-mvwhi">"Evangelizar, discipular y servir con estrategias
            creativas, guiando a las personas a ser transformadas
            en Cristo, a permanecer en la fe y a liderar para la gloria de Dios."</p>
        </div>
     </div>

  <div class="fon-test">

  <div class="con-curazu"> 
  <img src="./resources/cur-azul2.svg" alt="curva" class="img-curve"> 
  </div> 

  <h3 class="test">Testimonios</h3>
  
  <div class="carousel">
  <?php
  if ($result->num_rows > 0) {
      while ($data = $result->fetch_assoc()) {
          ?>
          <div class="registro">
              <p class="test-bd"><?php echo htmlspecialchars($data['nombre'] ?? 'Nombre no disponible'); ?></p>
              <p class="tes-bd"><?php echo htmlspecialchars($data['testimonio'] ?? 'Testimonio no disponible'); ?></p>
          </div>
          <?php
      }
  } else {
      echo "<p>No hay registros disponibles.</p>";
  }
  ?>
</div>

  </div>     

  <div class="con-curve2">
    <img src="./resources/curva.png" alt="curva" class="img-curve">
  </div>

  <h3 class="test-ti">Escribe tu testimonio</h3>

  <div class="cardback-seg">

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
  <script src="js/car-form.js"></script>  

  <?php
  include_once './modulos/nav.php';

  include './modulos/footer.php';
  ?>

</body>

</html>
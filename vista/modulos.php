<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="icon" type="image/png" href="../resources/iconpag.png">

    <link rel="stylesheet" href="../css/load.css">
    <link rel="stylesheet" href="../css/modulos.css">
</head>

<body>
    <div id="loading">
        <div class="spinner"></div>
    </div>

    <?php include_once '../modulos/nav.php'; ?>

    <div class="content">

        <div id="imageCarousel" class="carousel slide w-100" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/1200x400/ff6b6b/ffffff" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400/feca57/ffffff" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400/1dd1a1/ffffff" class="d-block w-100" alt="Imagen 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

        <h1> HORARIOS PRINCIPALES </h1>

        <div class="text-horarios">
        <button class="btn-horario active" id="btn-dom">DOMINGOS</button>
        <button class="btn-horario" id="btn-mir">MIÉRCOLES</button>
        </div>

        <div class="container">
            <div class="card">
            <h3></h3>
        <p class="profesor"></p>
        <p class="horario"></p>

            </div>
            <div class="card">
            <h3></h3>
        <p class="profesor"></p>
        <p class="horario"></p>
            </div>
            <div class="card">
            <h3></h3>
        <p class="profesor"></p>
        <p class="horario"></p>
            </div>
            <div class="card">
            <h3></h3>
        <p class="profesor"></p>
        <p class="horario"></p>
            </div>
            <div class="card">
            <h3></h3>
        <p class="profesor"></p>
        <p class="horario"></p>
            </div>
            <div class="card">
            <h3></h3>
        <p class="profesor"></p>
        <p class="horario"></p>
            </div>
        </div>
    </div>

    <script src="../js/modulos.js"></script>
    <script src="../js/load.js"></script>

    <?php include '../modulos/footer.php'; ?>
</body>

</html>
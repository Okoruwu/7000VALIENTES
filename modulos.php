<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/styleind.css">
    <link rel="stylesheet" href="./css/stylefon.css">
    <link rel="stylesheet" href="./css/stylenav.css">
    <link rel="stylesheet" href="./css/styleform.css">
    <link rel="stylesheet" href="./css/load.css">
    <link rel="stylesheet" href="./css/modulos.css">
</head>

<body>
    <div id="loading">
        <div class="spinner"></div>
    </div>

    <?php include_once './modulos/nav.php'; ?>

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

        <div class="container">
            <div class="card">
                <h3>Materia 1</h3>
                <p>Maestro: Juan Pérez</p>
                <p>Horario: 10:00 - 11:00 AM</p>
            </div>
            <div class="card">
                <h3>Materia 2</h3>
                <p>Maestro: Ana López</p>
                <p>Horario: 11:00 - 12:00 PM</p>
            </div>
            <div class="card">
                <h3>Materia 3</h3>
                <p>Maestro: Carlos Ruiz</p>
                <p>Horario: 12:00 - 1:00 PM</p>
            </div>
            <div class="card">
                <h3>Materia 4</h3>
                <p>Maestro: María Gómez</p>
                <p>Horario: 2:00 - 3:00 PM</p>
            </div>
            <div class="card">
                <h3>Materia 5</h3>
                <p>Maestro: Pedro Sánchez</p>
                <p>Horario: 3:00 - 4:00 PM</p>
            </div>
            <div class="card">
                <h3>Materia 6</h3>
                <p>Maestro: Sofía Fernández</p>
                <p>Horario: 4:00 - 5:00 PM</p>
            </div>
        </div>
    </div>

    <script src="./js/load.js"></script>

    <?php include './modulos/footer.php'; ?>
</body>

</html>
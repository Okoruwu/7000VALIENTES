<?php
        require_once '../bd/Database.php';

    $query = "SELECT materia, maestro, hora FROM `hora` ";

    $conn = Database::getConnection();
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
        ?>

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

        <button id="btn-dom" class="btn-horario">Domingo</button>
        <button id="btn-mir" class="btn-horario">Miércoles</button>
    </div>

    <div class="container">
        <?php
        $dias = ['domingo', 'miercoles'];
        foreach ($dias as $dia) {
            $query = "SELECT materia, maestro, hora FROM `hora` WHERE dia = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $dia);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($data = $result->fetch_assoc()) {
                    ?>
                    <div class="card" id="<?php echo $dia; ?>">
                        <p class="materia"><?php echo htmlspecialchars($data['materia'] ?? 'no disponible'); ?></p>
                        <p class="profesor"><?php echo htmlspecialchars($data['maestro'] ?? 'no disponible'); ?></p>
                        <p class="horario"><?php echo htmlspecialchars($data['hora'] ?? 'no disponible'); ?></p>
                    </div>
                    <?php
                }
            } else {
                echo "<p>.</p>";
            }
        }
        ?>
    </div>
    </div>

    <script src="../js/modulos.js"></script>
    <script src="../js/load.js"></script>

    <?php include '../modulos/footer.php'; ?>
</body>

</html>
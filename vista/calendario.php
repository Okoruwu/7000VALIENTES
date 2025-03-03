<?php
include_once '../bd/procedimientos.php';

if (isset($_GET['fecha'])) {
    header('Content-Type: application/json; charset=utf-8');
    $fecha = $_GET['fecha'];

    $eventos = obtenerEventosPorFecha($fecha);

    // Agrega una comprobación si no hay eventos o si hay un error
    if (!$eventos) {
        echo json_encode(["error" => "Error al obtener eventos"]);
    } elseif (empty($eventos)) {
        echo json_encode(["message" => "No hay eventos para esta fecha"]);
    } else {
        echo json_encode($eventos);
    }
    exit; // DETENER EJECUCIÓN
}

include_once '../modulos/nav.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
   
    <link rel="icon" type="image/png" href="../resources/iconpag.png">

    <link rel="stylesheet" href="../css/load.css">
    <link rel="stylesheet" href="../css/calendario.css">
</head>

<body>
    <div id="loading">
        <div class="spinner"></div>
    </div>

    <?php include_once '../modulos/nav.php'; ?>

    <div class="content">
        <h1>Eventos <span id="titulo"></span> </h1>
        <div class="container">
            <div id="calendar"></div>
            <div id="info">
            <h1>Próximos eventos</h1>
                <p class="desc">Presiona un día del calendario para conocer si hay un evento próximo!</p>
            </div>
        </div>
    </div>

    <script src="../js/load.js"></script>
    <script src="../js/calendario.js"></script>
    <script src="../js/calendarmes.js"></script>    

    <?php include '../modulos/footer.php'; ?>
</body>

</html>
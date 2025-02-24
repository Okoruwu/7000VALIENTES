<?php
include_once './modulos/nav.php';
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
    <link rel="stylesheet" href="./css/styleind.css">
    <link rel="stylesheet" href="./css/stylefon.css">
    <link rel="stylesheet" href="./css/stylenav.css">
    <link rel="stylesheet" href="./css/styleform.css">
    <link rel="stylesheet" href="./css/load.css">
    <link rel="stylesheet" href="./css/calendario.css">

</head>

<body>
    <div id="loading">
        <div class="spinner"></div>
    </div>

    <?php include_once './modulos/nav.php'; ?>

    <div class="content">
        <div class="container">
            <div id="calendar"></div>
            <div id="info">
                <h3>Seleccione un día</h3>
            </div>
        </div>
    </div>

    <script src="./js/load.js"></script>
    <script src="./js/calendario.js"></script>

    <?php include './modulos/footer.php'; ?>
</body>

</html>
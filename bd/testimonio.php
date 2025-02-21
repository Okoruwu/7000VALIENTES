<?php
require_once 'Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $ciudad = trim($_POST['ciudad']);
    $pais = trim($_POST['pais']);
    $testimonio = trim($_POST['testimonio']);

    if (empty($nombre) || empty($email) || empty($ciudad) || empty($pais) || empty($testimonio)) {
        die("Todos los campos son obligatorios.");
    }

    $db = Database::getInstance();
    $conn = $db->getConnection();

    $query = "INSERT INTO testimonios (nombre, email, ciudad, pais, testimonio) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sssss", $nombre, $email, $ciudad, $pais, $testimonio);

        if ($stmt->execute()) {
            echo "Testimonio guardado con éxito.";

            $to = "tu_correo@dominio.com";
            $subject = "Nuevo Testimonio Enviado";
            $message = "Testimonio de: $nombre\nEmail: $email\nCiudad: $ciudad\nPaís: $pais\n\nTestimonio: $testimonio";
            $headers = "From: no-reply@tudominio.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Correo enviado con éxito.";
            } else {
                echo "<script>console.error('Correo no enviado');</script>";
            }

        } else {
            echo "Error al guardar el testimonio en la base de datos.";
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }

    $conn->close();

    header("Location: ../index.php");
    exit();
}
?>
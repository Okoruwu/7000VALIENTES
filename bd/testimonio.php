<?php
require_once 'Database.php';  // Asegúrate de que el archivo Database.php esté en el mismo directorio o ajusta la ruta

// Si el formulario es enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $ciudad = trim($_POST['ciudad']);
    $pais = trim($_POST['pais']);
    $testimonio = trim($_POST['testimonio']);

    // Validación simple
    if (empty($nombre) || empty($email) || empty($ciudad) || empty($pais) || empty($testimonio)) {
        die("Todos los campos son obligatorios.");
    }

    // Conectar a la base de datos
    $db = Database::getInstance();
    $conn = $db->getConnection();

    // Preparar consulta para insertar el testimonio
    $query = "INSERT INTO testimonios (nombre, email, ciudad, pais, testimonio) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Vincular los parámetros
        $stmt->bind_param("sssss", $nombre, $email, $ciudad, $pais, $testimonio);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Testimonio guardado con éxito.";

            // Enviar correo
            $to = "tu_correo@dominio.com"; // Cambia esto por tu correo
            $subject = "Nuevo Testimonio Enviado";
            $message = "Testimonio de: $nombre\nEmail: $email\nCiudad: $ciudad\nPaís: $pais\n\nTestimonio: $testimonio";
            $headers = "From: no-reply@tudominio.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Correo enviado con éxito.";
            } else {
                // Si el correo no se envía, mostrar el mensaje en la consola
                echo "<script>console.error('Correo no enviado');</script>";
            }

        } else {
            echo "Error al guardar el testimonio en la base de datos.";
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta.";
    }

    // Cerrar la conexión
    $conn->close();

    // Redirigir a index.php después de procesar
    header("Location: ../index.php");
    exit();
}
?>
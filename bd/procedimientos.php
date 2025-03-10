<?php
// procedimientos.php
include_once 'Database.php';

function agregarUsuario($nombre, $email, $password, $rol)
{
    $conn = Database::getConnection();
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password_hash, rol) VALUES (?, ?, ?, ?)");
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $email = strtolower(trim($email)); // Normalizar el correo
    $stmt->bind_param("ssss", $nombre, $email, $passwordHash, $rol);
    $result = $stmt->execute();
}

function eliminarUsuario($usuario_id)
{
    $conn = Database::getConnection();
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $usuario_id);
    $result = $stmt->execute();

}

function agregarEvento($titulo, $descripcion, $fecha_evento, $imagen_url = null)
{
    $conn = Database::getConnection();
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    $stmt = $conn->prepare("INSERT INTO eventos (titulo, descripcion, fecha_evento, imagen_url) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssss", $titulo, $descripcion, $fecha_evento, $imagen_url);
    $result = $stmt->execute();
}

function eliminarEvento($evento_id)
{
    $conn = Database::getConnection();
    $stmt = $conn->prepare("DELETE FROM eventos WHERE id = ?");
    $stmt->bind_param("i", $evento_id);
    $result = $stmt->execute();

}

function obtenerEventosPorFecha($fecha)
{
    $conn = Database::getConnection();
    $stmt = $conn->prepare("SELECT titulo, descripcion, imagen_url FROM eventos WHERE DATE(fecha_evento) = ?");
    $stmt->bind_param("s", $fecha);
    $stmt->execute();
    $result = $stmt->get_result();

    $eventos = [];
    while ($row = $result->fetch_assoc()) {
        $eventos[] = $row;
    }

    return $eventos;
}

function AgregarClase($day, $Nclase, $prof, $hora)
{
    {
        $conn = Database::getConnection();
        if (!$conn) {
            die("Error de conexión a la base de datos");
        }
    
        $stmt = $conn->prepare("INSERT INTO hora (dia, materia, maestro, hora) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conn->error);
        }
    
        $stmt->bind_param("ssss", $day, $Nclase, $prof, $hora);
        $result = $stmt->execute();
    
    }
}

function eliminarClase($Cname)
{
    $conn = Database::getConnection();
    $stmt = $conn->prepare("DELETE FROM hora WHERE materia = ?");
    $stmt->bind_param("s", $Cname);
    $result = $stmt->execute();

}

function updateClase($idmatant, $Upmateria, $Uhora)
{
    $conn = Database::getConnection();
    $stmt = $conn->prepare("UPDATE hora SET materia = ?, hora = ? WHERE materia = ?");
    $stmt->bind_param("sss", $Upmateria, $Uhora, $idmatant);
    $result = $stmt->execute();

}

function verificarLogin($email, $password)
{
    $conn = Database::getConnection();
    $stmt = $conn->prepare("SELECT id, nombre, password_hash, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verificar contraseña con password_verify()
        if (password_verify($password, $user['password_hash'])) {
            return $user; // Devolvemos los datos del usuario si la contraseña es correcta
        }
    }

    return false; // Si no se encontró el usuario o la contraseña es incorrecta
}


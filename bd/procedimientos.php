<?php
// procedimientos.php
include_once 'Database.php';

function agregarUsuario($nombre, $email, $password, $rol)
{
    $conn = Database::getConnection();

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password_hash, rol) VALUES (?, ?, ?, ?)");
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $nombre, $email, $passwordHash, $rol);
    $result = $stmt->execute();

    return $result ? 'success' : 'error';
}

function eliminarUsuario($usuario_id)
{
    $conn = Database::getConnection();

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $usuario_id);
    $result = $stmt->execute();

    return $result ? 'success' : 'error';
}

function agregarEvento($titulo, $descripcion, $fecha_evento)
{
    $conn = Database::getConnection();

    $stmt = $conn->prepare("INSERT INTO eventos (titulo, descripcion, fecha_evento) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $titulo, $descripcion, $fecha_evento);
    $result = $stmt->execute();

    return $result ? 'success' : 'error';
}

function eliminarEvento($evento_id)
{
    $conn = Database::getConnection();

    $stmt = $conn->prepare("DELETE FROM eventos WHERE id = ?");
    $stmt->bind_param("i", $evento_id);
    $result = $stmt->execute();

    return $result ? 'success' : 'error';
}
?>
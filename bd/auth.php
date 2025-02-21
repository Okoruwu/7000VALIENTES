<?php
session_start();
require_once '../bd/Database.php';

// Depuracion de errores
// error_reporting(E_ALL); 
// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Todos los campos son obligatorios.";
        // Depuracion de errores
        // echo "<script>console.error('Error: Todos los campos son obligatorios.');</script>";
        header("Location: ../vista/login.php");
        exit();
    }

    $db = Database::getInstance();
    $conn = $db->getConnection();

    if ($conn->connect_error) {
        $_SESSION['error'] = "Error de conexión con la base de datos.";
        // Depuracion de errores
        // echo "<script>console.error('Error de conexión con la base de datos: " . addslashes($conn->connect_error) . "');</script>";
        header("Location: ../vista/login.php");
        exit();
    }

    $query = "SELECT id, nombre, password_hash, rol FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        $_SESSION['error'] = "Error en la consulta.";
        // Depuracion de errores
        // echo "<script>console.error('Error en la consulta SQL: " . addslashes($conn->error) . "');</script>";
        header("Location: ../vista/login.php");
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['password_hash']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];
            $_SESSION['user_role'] = $user['rol'];

            // Depuracion de errores
            // echo "<script>console.log('Inicio de sesión exitoso: Usuario " . addslashes($user['nombre']) . " con rol " . addslashes($user['rol']) . "');</script>";

            switch ($user['rol']) {
                case 'admin':
                    header("Location: ../dashboard/admin.php");
                    break;
                case 'editor':
                    header("Location: ../dashboard/editor.php");
                    break;
                case 'usuario':
                default:
                    header("Location: ../dashboard/usuario.php");
                    break;
            }
            exit();
        } else {
            $_SESSION['error'] = "Contraseña incorrecta.";
            // Depuracion de errores
            // echo "<script>console.warn('Contraseña incorrecta para el usuario: " . addslashes($email) . "');</script>";
        }
    } else {
        $_SESSION['error'] = "Correo no registrado.";
        // Depuracion de errores
        // echo "<script>console.warn('Correo no encontrado en la base de datos: " . addslashes($email) . "');</script>";
    }

    header("Location: ../vista/login.php");
    exit();
}
?>
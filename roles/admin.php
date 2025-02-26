<?php
include_once '../bd/Database.php';
include_once '../bd/procedimientos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_user'])) {
        $nombre = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rol = $_POST['rol'];
        echo agregarUsuario($nombre, $email, $password, $rol);
    }

    if (isset($_POST['delete_user'])) {
        $usuario_id = $_POST['user_id'];
        $result = eliminarUsuario($usuario_id);
        if ($result) {
            echo '<script>Swal.fire("Usuario Eliminado", "El usuario ha sido eliminado exitosamente.", "success");</script>';
        } else {
            echo '<script>Swal.fire("Error", "Hubo un error al eliminar el usuario.", "error");</script>';
        }
    }

    if (isset($_POST['submit_event'])) {
        $titulo = $_POST['event_name'];
        $descripcion = $_POST['event_description'];
        $fecha_evento = $_POST['event_date'];

        // Llamar al procedimiento y pasar la imagen si fue subida
        if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === 0) {
            echo agregarEvento($titulo, $descripcion, $fecha_evento, $_FILES['event_image']['name']);
        } else {
            echo agregarEvento($titulo, $descripcion, $fecha_evento);
        }
    }

    if (isset($_POST['delete_event'])) {
        $evento_id = $_POST['event_id'];
        $result = eliminarEvento($evento_id);
        if ($result) {
            echo '<script>Swal.fire("Evento Eliminado", "El evento ha sido eliminado exitosamente.", "success");</script>';
        } else {
            echo '<script>Swal.fire("Error", "Hubo un error al eliminar el evento.", "error");</script>';
        }
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Administración</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="container">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="javascript:void(0)" onclick="showSection('users')">Usuarios</a></li>
                <li><a href="javascript:void(0)" onclick="showSection('events')">Eventos</a></li>
            </ul>
        </nav>

        <div class="main-content">
            <header>
                <h1>Bienvenido al Panel de Administración</h1>
                <p>Selecciona una opción del menú para gestionar el contenido.</p>
            </header>

            <section class="content-section" id="users" style="display:none;">
                <h2>Usuarios</h2>
                <div>
                    <h3>Agregar Usuario</h3>
                    <form method="POST">
                        <label for="username">Nombre de Usuario:</label>
                        <input type="text" id="username" name="username" required>
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" required>
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                        <label for="rol">Rol:</label>
                        <select id="rol" name="rol" required>
                            <option value="admin">Administrador</option>
                            <option value="editor">Editor</option>
                            <option value="usuario">Usuario</option>
                        </select>
                        <button type="submit" name="submit_user">Agregar Usuario</button>
                    </form>
                </div>
                <div>
                    <h3>Eliminar Usuario</h3>
                    <form method="POST">
                        <label for="user_id">ID del Usuario:</label>
                        <input type="text" id="user_id" name="user_id" required>
                        <button type="submit" name="delete_user">Eliminar Usuario</button>
                    </form>
                </div>
            </section>

            <section class="content-section" id="events" style="display:none;">
                <h2>Eventos</h2>
                <div>
                    <h3>Agregar Evento</h3>
                    <form method="POST" enctype="multipart/form-data">
                        <label for="event_name">Nombre del Evento:</label>
                        <input type="text" id="event_name" name="event_name" required>

                        <label for="event_description">Descripción:</label>
                        <textarea id="event_description" name="event_description" required></textarea>

                        <label for="event_date">Fecha del Evento:</label>
                        <input type="datetime-local" id="event_date" name="event_date" required>

                        <label for="event_image">Imagen del Evento:</label>
                        <input type="file" id="event_image" name="event_image" accept="image/*" required>

                        <button type="submit" name="submit_event">Agregar Evento</button>
                    </form>


                </div>
                <div>
                    <h3>Eliminar Evento</h3>
                    <form method="POST">
                        <label for="event_id">ID del Evento:</label>
                        <input type="text" id="event_id" name="event_id" required>
                        <button type="submit" name="delete_event">Eliminar Evento</button>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script src="../js/admin.js"></script>
    <script>
        function showSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                const sections = document.querySelectorAll('.content-section');
                sections.forEach(function (sec) {
                    sec.style.display = 'none';
                });

                section.style.display = 'block';
            } else {
                console.error('Sección no encontrada: ' + sectionId);
            }
        }
    </script>
</body>

</html>
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
        echo $result ? '<script>Swal.fire("Usuario Eliminado", "El usuario ha sido eliminado exitosamente.", "success");</script>'
            : '<script>Swal.fire("Error", "Hubo un error al eliminar el usuario.", "error");</script>';
    }

    if (isset($_POST['submit_event'])) {
        $titulo = $_POST['event_name'];
        $descripcion = $_POST['event_description'];
        $fecha_evento = $_POST['event_date'];
        $imagen = null; 
    
        if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] === 0) {
            $directorioDestino = "../uploads/"; 
            $nombreArchivo = basename($_FILES['event_image']['name']);
            $rutaCompleta = $directorioDestino . $nombreArchivo;
    
            // Intentar mover el archivo
            if (move_uploaded_file($_FILES['event_image']['tmp_name'], $rutaCompleta)) {
                $imagen = "uploads/" . $nombreArchivo; 
            } else {
                die("Error al subir la imagen.");
            }
        }
    
        echo agregarEvento($titulo, $descripcion, $fecha_evento, $imagen);
    }

    if (isset($_POST['delete_event'])) {
        $evento_id = $_POST['event_id'];
        $result = eliminarEvento($evento_id);
        echo $result ? '<script>Swal.fire("Evento Eliminado", "El evento ha sido eliminado exitosamente.", "success");</script>'
            : '<script>Swal.fire("Error", "Hubo un error al eliminar el evento.", "error");</script>';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_class'])) {
        $day = $_POST['day'];
        $Nclase = $_POST['class_name'];
        $prof = $_POST['name_profesor'];
        $hora = $_POST['class_hour'];
                echo AgregarClase($day, $Nclase, $prof, $hora);
                }

    if (isset($_POST['delete_class'])) {
        $Cname = $_POST['Cname_id'];
        $result = eliminarClase($Cname);
        echo $result ? '<script>Swal.fire("Usuario Eliminado", "El usuario ha sido eliminado exitosamente.", "success");</script>'
            : '<script>Swal.fire("Error", "Hubo un error al eliminar el usuario.", "error");</script>';
    }

    if (isset($_POST['update_class'])) {
        $idmatant = $_POST['ant_mat'];
        $Upmateria = $_POST['mat_act'];
        $Uhora = $_POST['hora_act'];
        echo updateClase( $idmatant, $Upmateria, $Uhora);
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/admin.css">
<script src="../js/admin.js"></script>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../resources/iconpag.png">
    <title>Dashboard de Administración</title>
</head>

<body>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop"
        aria-controls="staticBackdrop"> Menu</button>
    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop"
        aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="sidebar">
                <div class="logo">
                    <img src="../resources/logo.png" alt="" width="270" height="75">
                </div>
                <div class="sidebar-header">
                    <h2>Admin Panel</h2>
                </div>
                <ul class="sidebar-menu">
                    <li><a href="javascript:void(0)" onclick="showSection('users')">Usuarios</a></li>
                    <li><a href="javascript:void(0)" onclick="showSection('events')">Eventos</a></li>
                    <li><a href="javascript:void(0)" onclick="showSection('class-card')">Clases</a></li>                    
                    <li><a href="#">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="main-content">
            <header>
                <h1>Bienvenido al Panel de Administración</h1>
                <p class="p-opcion">Selecciona una opción del menú para gestionar el contenido.</p>
            </header>

            <section class="content-section" id="users" style="display:none;">
                <h3>Agregar Usuario</h3>
                <form method="POST" class="form-user">
                    <label>Nombre de Usuario:</label>
                    <input type="text" name="username" required>
                    <label>Correo Electrónico:</label>
                    <input type="email" name="email" required>
                    <label>Contraseña:</label>
                    <input type="password" name="password" required>
                    <label>Rol:</label>
                    <select name="rol" required class="roles">
                        <option value="admin">Administrador</option>
                        <option value="editor">Editor</option>
                        <option value="usuario">Usuario</option>
                    </select>
                    <button type="submit" name="submit_user" class="btn-send">Agregar Usuario</button>
                </form>
                <h3>Eliminar Usuario</h3>
                <form method="POST" class="form-user">
                    <label>ID del Usuario:</label>
                    <input type="text" name="user_id" required>
                    <button type="submit" name="delete_user" class="btn-delete">Eliminar Usuario</button>
                </form>
            </section>

            <section class="content-section" id="events" style="display:none;">
                <h3>Agregar Evento</h3>
                <form method="POST" enctype="multipart/form-data" class="form-event">
                    <label>Nombre del Evento:</label>
                    <input type="text" name="event_name" required>
                    <label>Descripción:</label>
                    <textarea name="event_description" required></textarea>
                    <label>Fecha del Evento:</label>
                    <input type="datetime-local" name="event_date" class="fecha" required>
                    <label>Imagen del Evento:</label>
                    <input type="file" name="event_image" accept="image/*">
                    <button type="submit" name="submit_event" class="btn-send">Agregar Evento</button>
                </form>
                <h3>Eliminar Evento</h3>
                <form method="POST" class="form-event">
                    <label>ID del Evento:</label>
                    <input type="text" name="event_id" required>
                    <button type="submit" name="delete_event" class="btn-delete">Eliminar Evento</button>
                </form>
            </section>

            <section class="content-section" id="class-card" style="display:none;">
                <h3>Agregar | Actualizar Clase</h3>
                <form method="POST" enctype="multipart/form-data" class="form-event">
                    <label>Dia de la clase:</label>
                    <select name="day" required class="roles">
                        <option value="miercoles">Miercoles</option>
                        <option value="domingo">Domingo</option>
                    </select>                    
                    <label>Nombre de la clase:</label>
                    <input type="text" name="class_name" required>
                    <label>Nombre del profesor:</label>
                    <input type="text" name="name_profesor" required></input>
                    <label>Hora de clase:</label>
                    <input type="text" name="class_hour" required>
                    <button type="submit" name="submit_class" class="btn-send">Agregar Clase</button>
                </form>
                <h3>Eliminar Clase</h3>
                <form method="POST" class="form-event">
                    <label>Nombre de la clase:</label>
                    <input type="text" name="Cname_id" required>
                    <button type="submit" name="delete_class" class="btn-delete">Eliminar Clase</button>
                </form>

                <h3>Actualizar Clase</h3>
                <form method="POST" class="form-event">
                    <label>Nombre de la clase para actualizar:</label>
                    <input type="text" name="ant_mat" required>
                    <label>Nombre de la clase:</label>
                    <input type="text" name="mat_act" required>
                    <label>Hora de la clase:</label>
                    <input type="text" name="hora_act" required>                                        
                    <button type="submit" name="update_class" class="btn-send">Actualizar Clase</button>
                </form>
            </section>

        </div>
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(sec => sec.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>

</html>
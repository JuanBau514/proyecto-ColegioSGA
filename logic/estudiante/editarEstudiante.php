<?php
include("../../logic/estudiante/crud_e.php");
include("../../config/db.php");
session_start();
$db = new DataBase();
$crud_e = new Crud_e($db->connect());

if (isset($_GET['estudiante'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['estudiante']);
    $estudiante = $crud_e->obtenerEstudiante($email);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Edashboard.css">
    <title>Estudiante Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome/dist/line-awesome/css/line-awesome.min.css">

</head>

<body>

    <!-- Sidebar o menu lateral -->

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
                <img src="../../sources/img/Colegio Nicolas Gomez Davila (IED).jpg" width="30px" alt="logo">

                <div class="brand-icons">
                    <span class="las la-bell"></span>
                    <span class="las la-user-circle"></span>
                </div>
            </div>
        </div>

        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="../../sources/img/estudiante.jpg" alt="foto de perfil">
                <div>
                    <?php echo $estudiante["nombre"]; ?></h3>
                    <p><span>Estudiante</span></p>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                        <a href="../../pages/Dashboard/estudianteDs.php?estudiante=<?php echo $email; ?>" class="active">
                            <span class="las la-igloo"></span>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="../../logic/estudiante/perfilEstudiante.php?estudiante=<?php echo $email; ?>">
                            <span class="las la-user"></span>
                            <span>Perfil</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../index.php"><?php session_destroy() ?>
                            <span class="las la-sign-out-alt"></span>
                            <span>Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>
                <div class="menu-head">
                    <span>Estudiante</span>
                </div>
                <ul>
                    <li>
                        <a href="#">
                            <span class="las la-igloo"></span>
                            <span> Horario</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Tareas</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../logic/estudiante/notasEstudiante.php?estudiante=<?php echo $email; ?>">
                            <span class="las la-clipboard-list"></span>
                            <span>Notas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-clipboard-list"></span>
                            <span>Eventos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Profesores</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <!-- Contenido principal -->

    <div class="main-content">
        <header>
            <div class="menu-toggle">
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
            </div>
            <div class="header-icons foto-perfil">
                <span class="las la-search"></span>
                <span class="las la-bookmark"></span>
                <span class="las la-sms"></span>
                <img src="../../sources/img/estudiante.jpg" width="30px" alt="foto de perfil">
                <div class="info-p">
                    <h4><?php echo $estudiante["nombre"]; ?></h4>
                    <small>estudiante</small>
                </div>
            </div>

        </header>

        <main>
            <form method="post" action="../procesos/actualizar_e.php">
                <div class="page-header inicio">
                    <div>
                        <h1>Datos Personales</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $estudiante["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $estudiante["id"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Edad: </span>
                                <input type='text' id="edad" name="edad" value="<?php echo $estudiante["edad"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Grado: </span>
                                <input type='text' id="grado" name="grado" value="<?php echo $estudiante["grado"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $estudiante["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $estudiante["contrasena"]; ?>">
                            </p>
                        </div>
                        <div class="centrado">
                            <br><br> <button class="boton">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>
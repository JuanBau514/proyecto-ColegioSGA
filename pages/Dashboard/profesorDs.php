<?php
include("../../logic/profesor/crud_profe.php");
include("../../config/db.php");
session_start();
$db = new DataBase();
$crud_p = new Crud_profe($db->connect());

if (isset($_GET['profesor'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['profesor']);
    $profesor = $crud_p->obtenerProfesor($email);
}
?>
<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Prodashboard.css">
    <title>Profesor Dashboard</title>
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
                <img src="../../sources/img/admin.png" alt="foto de perfil">
                <div>
                    <h3><?php echo $profesor["nombre"]; ?></h3>
                    <span>Profesor</span>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                        <a href="../../logic/profesor/inicio.php?profesor=<?php echo $email; ?>">
                            <span class="las la-igloo"></span>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="../../logic/profesor/perfilProfesor.php?profesor=<?php echo $email; ?>">
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
                    <span>Docente</span>
                </div>
                <ul>
                    <li>
                        <a href="../../logic/profesor/gruposProfe.php?profesor=<?php echo $email;?>">
                            <span class="las la-user"></span>
                            <span>Consultar grupos</span>
                        </a>
                    <li>
                        <a href="#">
                            <span class="las la-clipboard-list"></span>
                            <span>Consultar horario</span>
                        </a>
                    </li>
                    <li>
                    <a href="../../logic/profesor/contactarPadres.php?profesor=<?php echo $email;?>">
                            <span class="las la-user"></span>
                            <span>Contactar Padres</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../logic/profesor/eventosProfesor.php?profesor=<?php echo $email; ?>">
                            <span class="las la-calendar"></span>
                            <span>Calendario de eventos</span>
                        </a>
                    <li>
                       <a href="../../logic/profesor/notasProfe.php?profesor=<?php echo $email; ?>">
                            <span class="las la-sign-out-alt"></span>
                            <span>Modificar notas</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Contenido principal -->
  

    <script src="../../logic/dashboard.js"></script>
</body>

</html>
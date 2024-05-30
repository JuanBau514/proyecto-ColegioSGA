<?php
include("../../logic/padre/crud_padre.php");
include("../../config/db.php");
session_start();
$db = new DataBase();
$crud_padre = new Crud_padre($db->connect());

if (isset($_GET['padre'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['padre']);
    $padre = $crud_padre->obtenerPadre($email);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Padashboard.css">
    <title>Padre Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/line-awesome/dist/line-awesome/css/line-awesome.min.css">

</head>

<body>

    <!-- Sidebar o menu lateral -->

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
                <img src="/sources/img/Colegio Nicolas Gomez Davila (IED).jpg" width="30px" alt="logo">

                <div class="brand-icons">
                    <span class="las la-bell"></span>
                    <span class="las la-user-circle"></span>
                </div>
            </div>
        </div>

        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="/sources/img/admin.png" alt="foto de perfil">
                <div>
                    <?php echo $padre["nombre"]; ?></h3>
                    <p><span>Padre de Familia</span></p>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                    <a href="../../logic/padre/inicio.php?padre=<?php echo $email; ?>">
                            <span class="las la-igloo"></span>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="../../logic/padre/perfilPadre.php?padre=<?php echo $email;?>">
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
                    <span>Padre</span>
                </div>
                <ul>
                    <li>
                    <a href="../../logic/padre/contactarProfe.php?padre=<?php echo $email;?>">
                            <span class="las la-igloo"></span>
                            <span>Contactar profesores</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Consultar eventos</span>
                        </a>
                    <li>
                        <a href="#">
                            <span class="las la-clipboard-list"></span>
                            <span>Consultar Trabajos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Consultar notas</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <script src="/logic/dashboard.js"></script>
</body>

</html>
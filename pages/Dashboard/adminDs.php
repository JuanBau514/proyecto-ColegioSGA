<?php
include("../../logic/administrador/crud_admin.php");
include("../../config/db.php");
session_start();
$db = new DataBase();
$crud_a= new Crud_admin($db->connect());

if (isset($_GET['admin'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['admin']);
    $admin = $crud_a->obtenerAdmin($email);
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dashboard.css">
    <title>Administrador Dashboard</title>
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
                <h3><?php echo $admin["nombre"]; ?></h3>
                    <span>Administrador ._.</span>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                    <a href="../../logic/administrador/inicio.php?admin=<?php echo $email; ?>" class="active">
                            <span class="las la-igloo"></span>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                    <a href="../../logic/administrador/perfilAdmin.php?admin=<?php echo $email; ?>">
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
                    <span>Administrador</span>
                </div>
                <ul>
                    <li>
                    <a href="../../logic/administrador/gestionarProfe.php?admin=<?php echo $email; ?>">
                            <span class="las la-igloo"></span>
                            <span>Gestionar profesores</span>
                        </a>
                    </li>                   
                    <a href="../../logic/administrador/gestionarEstu.php?admin=<?php echo $email; ?>">
                            <span class="las la-clipboard-list"></span>
                            <span>Gestionar estudiantes</span>
                        </a>
                    </li>
                    <li>
                    <a href="../../logic/administrador/gestionarPadre.php?admin=<?php echo $email; ?>">
                            <span class="las la-user"></span>
                            <span>Gestionar padres</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Modificar planes de estudio</span>
                        </a>
                    <li>
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
                <img src="/sources/img/admin.png" width="30px" alt="foto de perfil">
                <div class="info-p">
                <h3><?php echo $admin["nombre"]; ?></h3>
                    <small>admin</small>
                </div>
            </div>

        </header>
       
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>
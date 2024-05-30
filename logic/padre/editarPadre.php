<?php
include("../../logic/padre/crud_padre.php");
include("../../logic/estudiante/crud_e.php");
include("../../config/db.php");
session_start();
$db = new DataBase();
$crud_padre = new Crud_padre($db->connect());
$crud_hijo = new Crud_e($db->connect());

if (isset($_GET['padre'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['padre']);
    $padre = $crud_padre->obtenerPadre($email);    
    if($padre){
        $hijo = $crud_hijo->obtenerEstudiantePorId($padre["idEs"]);
    }
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
                    <h3>Nombre Padre</h3>
                    <span>Padre</span>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                        <a href="../../pages/Dashboard/padresDs.php?padre=<?php echo $email; ?>" class="active">
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
                    <span>padre</span>
                </div>
                <ul>
                    <li>
                        <a href="#">
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

                    <h4><?php echo $padre["nombre"]; ?></h4>
                    <small>padre</small>
                </div>
            </div>

        </header>

        <main>
        <form method="post" action="../procesos/actualizar_pad.php">
                <div class="page-header inicio">
                    <div>
                        <h1>Datos Personales</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $padre["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $padre["id"]; ?>">
                            </p>
                        </div>                        
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $padre["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $padre["contrasena"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Telefono: </span>
                                <input type='text' id="telefono" name="telefono" value="<?php echo $padre["telefono"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación hijo matriculado:  </span>
                                <input type='text' id="idEs" name="idEs" value="<?php echo $padre["idEs"]; ?>">
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
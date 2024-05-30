<?php
 include("../../logic/estudiante/crud_e.php");
 include("../../config/db.php");
 session_start();
 $db = new DataBase();
 $crud_e= new Crud_e($db->connect());

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
                    <h3><?php echo $estudiante["nombre"];?></h3>
                    <span>Estudiante</span>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                    <a href="../../logic/estudiante/inicio.php?estudiante=<?php echo $email; ?>">
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
                            <span>Tareas </span>
                        </a>
                    </li>
                    <li>
                    <a href="../../logic/estudiante/notasEstudiante.php?estudiante=<?php echo $email;?>">
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
                    <a href="../../logic/estudiante/consultarProfe.php?estudiante=<?php echo $email;?>">
                            <span class="las la-user"></span>
                            <span>Consultar Profesores</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    
    <script src="/logic/dashboard.js"></script>
</body>

</html>
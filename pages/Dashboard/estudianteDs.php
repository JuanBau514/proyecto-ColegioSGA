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
                    <h3><?php echo $estudiante["Nombre"];?></h3>
                    <span>Estudiante</span>
                </div>
            </div>
            <div class="sidebar-menu">
                <div class="menu-head">
                    <span>Dashboard</span>
                </div>
                <ul>
                    <li>
                        <a href="#" class="active">
                            <span class="las la-igloo"></span>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
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
                            <span> Horario de Clase</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Tareas pendientes</span>
                        </a>
                    <li>
                        <a href="#">
                            <span class="las la-clipboard-list"></span>
                            <span>Consultar eventos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Contactar profesores</span>
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
                    <h4><?php echo $estudiante["Nombre"];?></h4>
                    <small>estudiante</small>
                </div>
            </div>

        </header>

        <main>
            <div class="page-header inicio">
                <div>
                    <h1>Dashboard de Estudiante</h1>
                    <small>Inicio</small>
                </div>
                <div class="header-actions">
                    <button>
                        <span class="las la-bell"></span>
                        Exportar
                    </button>
                    <button>
                        <span class="las la-tools"></span>
                        Configuración
                    </button>
                </div>
            </div>
            <div class="cards">
                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Tareas</span>
                                <small>Tareas no entregadas</small>
                            </div>
                            <h2>10</h2>
                            <small>Si no va a estudiar salga a vender vive 100</small>
                        </div>
                        <div class="card-chart danger">
                            <span class="las la-chart-line"> </span>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Promedio </span>
                                <small>Promedio Academico acumulado </small>
                            </div>
                            <h2>3.5</h2>
                            <small>tiene un 69% mejor que el promedio </small>
                        </div>
                        <div class="card-chart success">
                            <span class="las la-user-plus"> </span>
                        </div>
                    </div>
                </div>

                <div class="card-single">
                    <div class="card-flex">
                        <div class="card-info">
                            <div class="card-head">
                                <span>Materias vistas</span>
                                <small>Materias activas</small>
                            </div>
                            <h2>10</h2>
                            <small>zzz buen proceso</small>
                        </div>
                        <div class="card-chart warning">
                            <span class="las la-apple-alt"> </span>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>
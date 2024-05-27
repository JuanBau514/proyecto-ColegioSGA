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
                    <h3>Nombre Aministrador</h3>
                    <span>Administrador ._.</span>
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
                        <a href="#">
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
                        <a href="#">
                            <span class="las la-igloo"></span>
                            <span>Gestionar profesores</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Modificar planes de estudio</span>
                        </a>
                    <li>
                        <a href="#">
                            <span class="las la-clipboard-list"></span>
                            <span>Gestionar estudiantes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Gestionar padres</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-sign-out-alt"></span>
                            <span>Otorgar permisos </span>
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
                    <h4>Nombre Administrador</h4>
                    <small>admin</small>
                </div>
            </div>

        </header>

        <main>
            <div class="page-header inicio">
                <div>
                    <h1>Dashboard de administrativo del colegio</h1>
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
                                <span>Profesores</span>
                                <small>Profesores activos</small>
                            </div>
                            <h2>102</h2>
                            <small>2% menos que el mes pasado :c</small>
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
                                <span>Estudiantes</span>
                                <small>Estuantes Matriculados </small>
                            </div>
                            <h2>1240</h2>
                            <small>23% más que el mes pasado</small>
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
                                <span>Cursos entre 1 a 11 </span>
                                <small>Cursos activos</small>
                            </div>
                            <h2>52</h2>
                            <small>4% más que el mes pasado</small>
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
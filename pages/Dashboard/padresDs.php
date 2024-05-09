<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Ddashboard.css">
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
                    <h4>Nombre Administrador</h4>
                    <small>admin</small>
                </div>
            </div>

        </header>

        <main>
            <div class="page-header inicio">
                <div>
                    <h1>Dashboard Padre</h1>
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
                                <span>Hijos </span>
                                <small>Hijos matriculados</small>
                            </div>
                            <h2>4</h2>
                            <small>50% menos que el mes pasado no los dejen comer kumis del refrigerio con frijoles
                            </small>
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
                                <span>Eventos</span>
                                <small>Eventos Inscritos </small>
                            </div>
                            <h2>1</h2>
                            <small>si no va a estar pendiente de los hijos pues no los tenga no ?</small>
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
                                <span>Entrega de notas </span>
                                <small>Entrega de notas 4 periodo</small>
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
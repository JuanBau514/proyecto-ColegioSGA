<?php
include '../../pages/Dashboard/adminDs.php';
?>

<!DOCTYPE html>
<html lang="es">
<body>

<div class="main-content">
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

</body>
</html>
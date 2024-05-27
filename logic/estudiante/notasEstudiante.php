<?php
include("../../logic/estudiante/crud_e.php");
include("../../config/db.php");
include("../../logic/notas/vernotas.php");
session_start();
$db = new DataBase();
$crud_e = new Crud_e($db->connect());
$notas = new vernotas($db->connect());

if (isset($_GET['estudiante'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['estudiante']);
    $estudiante = $crud_e->obtenerEstudiante($email);
    $notasE = $notas->obtenerNotas($estudiante["id"]);
     
    $notas_agrupadas = [];
    $periodos = [];

    foreach ($notasE as $nota) {
        $materia = $nota['materia'];
        $periodo = $nota['periodo'];
        $periodos[$periodo] = true;
        // Si la materia aún no está en el arreglo, la inicializamos
        if (!isset($notas_agrupadas[$materia])) {
            $notas_agrupadas[$materia] = [];
        }
        // Añadimos la nota al arreglo de la materia correspondiente
        $notas_agrupadas[$materia][$nota['periodo']] = $nota['nota'];
    }
    $ultimoPeriodo = max(array_keys($periodos));
    // Filtrar las notas para obtener solo el último período
    $notasUltimoPeriodo = [];
    foreach ($notas_agrupadas as $materia => $notas) {
        if (isset($notas[$ultimoPeriodo])) {
            $notasUltimoPeriodo[] = ['materia' => $materia, 'nota' => $notas[$ultimoPeriodo]];
        }
    }
    $promedio = 0;
    $totalPromedios = 0;
    $numeroDeMaterias = count($notas_agrupadas);
    foreach ($notas_agrupadas as $materia => $notas) {
        $totalNotas = array_sum($notas);
        $cantidadNotas = count($notas);
        $promedio = $cantidadNotas > 0 ? $totalNotas / $cantidadNotas : 0;
        $totalPromedios += $promedio;
    }
    // Calcular el promedio total de todas las materias
    $promedioTotal = $numeroDeMaterias > 0 ? $totalPromedios / $numeroDeMaterias : 0;
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
                    <h3><?php echo $estudiante["nombre"]; ?></h3>
                    <span>Estudiante</span>
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
                            <span>Horario</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="las la-user"></span>
                            <span>Tareas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
            <div class="centrado"><h1>NOTAS</h1></div>
            <br>
            <div class="page-header inicio">
                <div>
                    <p><small>Estudiante: </small><?php echo $estudiante["nombre"]; ?></p>
                    <p><small>Identificación: </small><?php echo $estudiante["id"]; ?></p>
                    <p><small>Grado: </small><?php echo $estudiante["grado"]; ?></p>
                </div>
                <div>
                    <p><small>Promedio: </small><?php echo number_format($promedioTotal, 2) ?></p>
                    <p><small>Período académico: </small><?php echo $ultimoPeriodo; ?></p>
                </div>
                <div></div>
            </div>
            <br>
            <div>
                <table border="1" style="margin: auto;">
                    <thead>
                        <tr>
                            <th>Asignatura</th>
                            <th>Nota 1</th>
                            <th>Nota 2</th>
                            <th>Nota 3</th>
                            <th>Nota 4</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($notas_agrupadas as $materia => $notas) : ?>
                            <tr>
                                <td><?php echo $materia; ?></td>
                                <td><?php echo isset($notas[1]) ? $notas[1] : '-'; ?></td>
                                <td><?php echo isset($notas[2]) ? $notas[2] : '-'; ?></td>
                                <td><?php echo isset($notas[3]) ? $notas[3] : '-'; ?></td>
                                <td><?php echo isset($notas[4]) ? $notas[4] : '-'; ?></td>
                                <td><?php
                                    $totalNotas = array_sum($notas);
                                    $cantidadNotas = count($notas);
                                    $promedio = $cantidadNotas > 0 ? $totalNotas / $cantidadNotas : 0;
                                    echo $promedio;
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="centrado" >
                <button>
                    <span class="las la-bell"></span>
                    Imprimir
                </button>
            </div>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>
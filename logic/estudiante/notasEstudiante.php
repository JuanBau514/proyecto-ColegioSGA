<?php
include("../../pages/Dashboard/estudianteDs.php");
include("../../logic/notas/vernotas.php");

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
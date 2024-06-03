<?php
include("../../pages/Dashboard/padresDs.php");
include("../../logic/notas/vernotas.php");
include("../../logic/estudiante/crud_e.php");

$notas = new vernotas($db->connect());
$crud_hijo = new Crud_e($db->connect());

if (isset($_GET['padre'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['padre']);
    if($padre){
        $hijo = $crud_hijo->obtenerEstudiantePorId($padre["idEs"]);
    }
    $notasE = $notas->obtenerNotas($hijo["id"]);
     
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
                    <h4><?php echo $padre["nombre"]; ?></h4>
                    <small>Padre</small>
                </div>
            </div>

        </header>

        <main>
            <div class="centrado"><h1>Notas de mi hijo <?php echo $hijo["nombre"]; ?></h1></div>
            <br>
            <div class="page-header inicio">
                <div>
                    <p><small>Estudiante: </small><?php echo $hijo["nombre"]; ?></p>
                    <p><small>Identificación: </small><?php echo $hijo["id"]; ?></p>
                    <p><small>Grado: </small><?php echo $hijo["grado"]; ?></p>
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
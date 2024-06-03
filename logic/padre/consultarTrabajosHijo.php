<?php
include("../../pages/Dashboard/padresDs.php");
include("../../logic/estudiante/crud_e.php");
include("../../logic/tareas/vertareas.php");
include("../../logic/grupos/vergrupos.php");

$tareas = new Vertareas($db->connect());
$grupos = new Vergrupo($db->connect());
$crud_hijo = new Crud_e($db->connect());

$pendientes = [];
$vencidas = [];
$completadas = [];

// Fecha actual
$fechaActual = new DateTime();

if (isset($_GET['padre'])) {
    $email = urldecode($_GET['padre']);
    $estudiante = $crud_hijo->obtenerEstudiantePorId($padre["idEs"]);
    $gruposEst = $grupos->obtenerGrupo($estudiante["grado"]); //todas las materias del curso del estudiante    

    if (!empty($gruposEst)) {
        foreach ($gruposEst as $grupoEstudiante) {
            $idGrupo = $grupoEstudiante['idGrupo'];
            $tareasEst = $tareas->obtenerTareas($idGrupo);

            foreach ($tareasEst as $tarea) {
                $fechaEntrega = $tarea['fechaEntrega'];
                if (gettype($fechaEntrega) === 'string') {
                    $fechaEntrega = new DateTime($fechaEntrega);
                }

                if ($fechaEntrega instanceof DateTime) {

                $completada = false;

                if ($completada) {
                    $completadas[] = $tarea;
                } elseif ($fechaEntrega < $fechaActual) {
                    $vencidas[] = $tarea;
                } else {
                    $pendientes[] = $tarea;
                }
            }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<div class="main-content">

    <main>
        <h1>Tareas de mi hijo <?php echo $estudiante["nombre"]; ?></h1>
        <br>
        <div class="tabs">
            <input type="radio" id="tab1" name="tab-control" checked>
            <input type="radio" id="tab2" name="tab-control">
            <input type="radio" id="tab3" name="tab-control">
            <ul>
                <li title="Pendientes"><label for="tab1" role="button" class="boton"><span>Pendientes</span></label></li>
                <li title="Vencidas"><label for="tab2" role="button" class="boton"><span>Vencidas</span></label></li>
                <li title="Completadas"><label for="tab3" role="button" class="boton"><span>Completadas</span></label></li>
            </ul>

            <div class="tab-content content1">
                <h2>Tareas Pendientes</h2>
                <ul>
                    <?php foreach ($pendientes as $tarea) : ?>
                        <div><h4><?php echo $tarea['materia']; ?></h4></div>
                        <div>* Descripción: <?php echo $tarea['descripcion']; ?></div>
                        <div>* Fecha de entrega: <?php echo $tarea['fechaEntrega']; ?></div>
                        <br>                        
                    <?php endforeach; ?>
                    <?php if (empty($pendientes)) : ?>
                        <li>No hay tareas pendientes.</li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="tab-content content2">
                <h2>Tareas Vencidas</h2>
                <ul>
                    <?php foreach ($vencidas as $tarea) : ?>
                        <div><h4><?php echo $tarea['materia']; ?></h4></div>
                        <div>* Descripción: <?php echo $tarea['descripcion']; ?></div>
                        <div>* Fecha de entrega: <?php echo $tarea['fechaEntrega']; ?></div>
                        <br>  
                    <?php endforeach; ?>
                    <?php if (empty($vencidas)) : ?>
                        <li>No hay tareas vencidas.</li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="tab-content content3">
                <h2>Tareas Completadas</h2>
                <ul>
                    <?php foreach ($completadas as $tarea) : ?>
                        <div><h4><?php echo $tarea['materia']; ?></h4></div>
                        <div>* Descripción: <?php echo $tarea['descripcion']; ?></div>
                        <div>* Fecha de entrega: <?php echo $tarea['fechaEntrega']; ?></div>
                        <br>  
                    <?php endforeach; ?>
                    <?php if (empty($completadas)) : ?>
                        <li>No hay tareas completadas.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>


    </main>
</div>
<script src="/logic/dashboard.js"></script>
</body>

</html>
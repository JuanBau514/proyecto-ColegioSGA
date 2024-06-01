<?php
include("../../pages/Dashboard/estudianteDs.php");
include("../../logic/horario/verhorario.php");
include("../../logic/grupos/vergrupos.php");

$horario = new Verhorario($db->connect());
$grupos = new Vergrupo($db->connect());

if (isset($_GET['estudiante'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['estudiante']);
    $estudiante = $crud_e->obtenerEstudiante($email);
    
    $gruposEst = $grupos->obtenerGrupo($estudiante["grado"]);//todas las materias del curso del estudiante    
        
    if (!empty($gruposEst)) {
        $tablaHorario = [];// almacenar el horario organizado por horas y días
      
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<body>
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
            <div class="centrado"><h1>HORARIO DE CLASES</h1></div>
            <div class="page-header inicio">
                <div>
                    <p><small>Estudiante: </small><?php echo $estudiante["nombre"]; ?></p>
                    <p><small>Grado: </small><?php echo $estudiante["grado"]; ?></p>
                </div> 
            </div>
            <br>
            <div>
                <table border="1" style="margin: auto;">
                    <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   foreach ($gruposEst as $grupoEstudiante) {
                                $idGrupo = $grupoEstudiante['idGrupo'];
                                $materias = $grupoEstudiante['materia'];
                                
                                $horarioEst = $horario->obtenerHorario($idGrupo);
                                foreach ($horarioEst as $horarioObj) {
                                    $dia = $horarioObj->dia;
                                    $hora = $horarioObj->hora;
                                    $materia = $horarioObj->materia;
                    
                                    // Inicializar la hora en la tabla si no existe
                                    if (!isset($tablaHorario[$hora])) {
                                        $tablaHorario[$hora] = array_fill_keys(['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'], '');
                                    }
                                    // Asignar la materia al día correspondiente
                                    $tablaHorario[$hora][$dia] = $materia;
                                }                                
                            }
                            $periodo = 1;
                            // Mostrar la tabla
                            foreach ($tablaHorario as $hora => $dias) {
                                echo "<tr>";
                                echo "<td>$hora</td>";
                                foreach ($dias as $dia => $materia) {
                                    echo "<td>$materia</td>";
                                }
                                echo "</tr>";
                                 
                                if ($periodo == 3) {
                                    echo "<tr>";
                                    echo "<td>Descanso</td>";
                                    for ($i = 0; $i < 5; $i++) {
                                        echo "<td>Descanso</td>";
                                    }
                                    echo "</tr>";
                                }
                                $periodo++;
                            }
                    ?>
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
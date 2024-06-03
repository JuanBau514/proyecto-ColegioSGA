<?php
include("../../pages/Dashboard/profesorDs.php");
include("../../logic/horario/verhorario.php");

$crud_h = new Verhorario($db->connect());

if (isset($_GET['profesor'])) {

    $idProfesor = $profesor['id'];
    $horarios = $crud_h->obtenerHorariosPorProfesor($idProfesor);
} else {
    $horarios = [];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Horario de Clases del Profesor</title>

</head>
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
                <img src="/sources/img/admin.png" width="30px" alt="foto de perfil">
                <div class="info-p">
                    <h4><?php echo $profesor["nombre"]; ?></h4>
                    <small>Profesor</small>
                </div>
            </div>
        </header>

        <main>
            <h1>Horario de Clases</h1>
            <br>
            <div class="page-header inicio">
                <table>
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th>Grupo</th>
                            <th>Día</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($horarios): ?>
                            <?php foreach ($horarios as $horario): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($horario['materia']); ?></td>
                                    <td><?php echo htmlspecialchars($horario['curso']); ?></td>
                                    <td><?php echo htmlspecialchars($horario['dia']); ?></td>
                                    <td><?php echo htmlspecialchars($horario['hora']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No hay horarios asignados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>    
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>
</html>
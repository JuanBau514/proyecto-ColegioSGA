<?php
include("../../logic/procesos/crudProfesor.php");
include("../../logic/procesos/crud_horarios.php");
include("../../config/db.php");

session_start();
$db = new DataBase();
$crud_p = new Crud_profe($db->connect());
$crud_h = new Crud_horario($db->connect());

if (isset($_GET['profesor'])) {
    $email = urldecode($_GET['profesor']);
    $profesor = $crud_p->obtenerProfesor($email);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
</head>
<body>
    <div id="calendar"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                events: [
                    <?php foreach ($horarios as $horario): ?>
                    {
                        title: 'Clase',
                        start: '<?php echo date('Y-m-d\TH:i:s', strtotime($horario["Dia"] . ' ' . $horario["Hora"])); ?>',
                        end: '<?php echo date('Y-m-d\TH:i:s', strtotime($horario["Dia"] . ' ' . date('H:i:s', strtotime('+1 hour', strtotime($horario["Hora"]))))); ?>'
                    },
                    <?php endforeach; ?>
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
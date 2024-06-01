<?php
include("../../pages/Dashboard/padresDs.php");
include("../../config/pedrologin.php");

// Obtener el mes y el año actuales
$month = date('m');
$year = date('Y');

if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
}

// Obtener el primer día del mes
$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

// Número de días en el mes
$numberDays = date('t', $firstDayOfMonth);

// Información del primer día del mes
$dateComponents = getdate($firstDayOfMonth);

// Nombre del mes
$monthName = $dateComponents['month'];

// Día de la semana del primer día del mes
$dayOfWeek = $dateComponents['wday'];

// Obtener el siguiente y el mes anterior
$nextMonth = $month + 1;
$nextYear = $year;
if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear = $year + 1;
}

$prevMonth = $month - 1;
$prevYear = $year;
if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear = $year - 1;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calendario de Eventos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .header {
            text-align: center;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
    </style>
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
            <div class="header">
                <h1>Calendario de Eventos - <?php echo $monthName . " " . $year; ?></h1>
                <div class="nav">
                    <a href="?month=<?php echo $prevMonth; ?>&year=<?php echo $prevYear; ?>">Mes Anterior</a>
                    <a href="?month=<?php echo $nextMonth; ?>&year=<?php echo $nextYear; ?>">Mes Siguiente</a>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Domingo</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                        <th>Sábado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $currentDay = 1;

                    echo "<tr>";

                    if ($dayOfWeek > 0) {
                        for ($k = 0; $k < $dayOfWeek; $k++) {
                            echo "<td></td>";
                        }
                    }

                    while ($currentDay <= $numberDays) {
                        if ($dayOfWeek == 7) {
                            $dayOfWeek = 0;
                            echo "</tr><tr>";
                        }

                        echo "<td>$currentDay</td>";
                        $currentDay++;
                        $dayOfWeek++;
                    }

                    if ($dayOfWeek != 7) {
                        $remainingDays = 7 - $dayOfWeek;
                        for ($i = 0; $i < $remainingDays; $i++) {
                            echo "<td></td>";
                        }
                    }

                    echo "</tr>";
                    ?>
                </tbody>
            </table>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>
</html>
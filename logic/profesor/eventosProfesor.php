<?php
include("../../pages/Dashboard/profesorDs.php");

include("../../logic/procesos/Crud_eventos.php");
include("../../logic/grupos/vergrupos.php");


// Crear una instancia del CRUD para eventos
$crud_e = new Crud_eventos($db->connect());
$eventos = $crud_e->obtenerTodos();


// Obtener eventos
$eventos = $crud_e->obtenerTodos();

$month = date('m');
$year = date('Y');

if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
}

$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
$numberDays = date('t', $firstDayOfMonth);
$dateComponents = getdate($firstDayOfMonth);
$monthName = $dateComponents['month'];
$dayOfWeek = $dateComponents['wday'];

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
        .event {
            background-color: #ffeb3b;
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
            <form action="" method="POST">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
                <br>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
                <br>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>
                <br>
                <label for="frecuencia">Frecuencia:</label>
                <select id="frecuencia" name="frecuencia" required>
                    <option value="diario">Diario</option>
                    <option value="semanal">Semanal</option>
                </select>
                <br>
                <button type="submit">Agregar Evento</button>
            </form>
            <br>
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

                        $date = "$year-$month-$currentDay";
                        echo "<td" . (isset($eventos[$date]) ? " class='event'" : "") . ">$currentDay";

                        if (isset($eventos[$date])) {
                            foreach ($eventos[$date] as $evento) {
                                echo "<br><strong>" . htmlspecialchars($evento['titulo']) . "</strong>";
                            }
                        }

                        echo "</td>";
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

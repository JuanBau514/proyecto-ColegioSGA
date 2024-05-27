<?php
include("../../logic/estudiante/crud_e.php");
include '../../pages/Dashboard/profesorDs.php';
include '../../config/pedrologin.php';
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
$sql = "select * from estudiante";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">


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
                <h4><?php echo $profesor["nombre"]; ?></h4>
                <small>profesor</small>
            </div>
        </div>

    </header>

    <main>
        <div class="centrado">
            <h1>Revisión y Modificación de Notas</h1>
        </div>
        <br>
        <div>
            <form action="" method="GET">
                <label for="username">Buscar estudiante:</label>
                <input type="text" name="busqueda">
                <input type="submit" name="enviar" value="Buscar">
            </form>
            <div>
                <?php
                if ($result->num_rows > 0) {
                    echo "<h2>Estudiantes Registrados:</h2>";
                    echo "<table border='1'>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                
                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['nombre'] . "</td>
                                <td>" . $row['correo'] . "</td>
                               
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No hay estudiantes registrados.</p>";
                }
                ?>
            </div>
        </div>
    </main>
</div>
<script src="/logic/dashboard.js"></script>
</body>

</html>
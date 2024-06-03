<?php
ob_start(); // Inicia el almacenamiento en buffer de salida
include '../../pages/Dashboard/adminDs.php';
include("../../logic/profesor/crud_profe.php");

$crud_p = new Crud_profe($db->connect());
$email = urldecode($_GET['profesor']);
$profesor = $crud_p->obtenerProfesor($email);
$adminEmail = urldecode($_GET['admin']);

// Procesar el formulario si se envió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    if (empty($id)) {
        echo "Error: No se recibió el ID del estudiante.";
        ob_end_flush(); // Envía el buffer de salida y desactiva el almacenamiento en buffer
        exit();
    }
    
    // Actualizar los datos del estudiante
    $eliminacionExitosa = $crud_p->eliminarProfesor($id);

    if ($eliminacionExitosa) {
        header("Location: gestionarProfe.php?admin=" . urlencode($adminEmail));
        ob_end_flush(); // Envía el buffer de salida y desactiva el almacenamiento en buffer
        exit();
    } else {
        echo "Error al eliminar los datos del estudiante.";
    }
}?>

<!DOCTYPE html>
<html lang="es">

<div class="main-content">
    <main>
        <form method="post" action="">
            <div class="page-header inicio">
                <div>
                    <h1>Eliminar profesor</h1><br>
                    <h4>¿Está seguro de eliminar este profesor?</h4>
                    <div>
                        <p><span>Nombre: </span><?php echo $profesor["nombre"]; ?></p>
                    </div>
                    <div>
                        <p><span>Identificación: </span><?php echo $profesor["id"]; ?></p>
                    </div>                    
                    <div>
                        <p><span>Email: </span><?php echo $profesor["email"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>Area: </span><?php echo $profesor["area"]; ?></p>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $profesor["id"]; ?>">
                    <div class="centrado">
                        <br><br> <button class="boton">Eliminar</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</div>
<script src="/logic/dashboard.js"></script>
</body>

</html>
<?php
ob_start(); // Inicia el almacenamiento en buffer de salida
include '../../pages/Dashboard/adminDs.php';
include("../../logic/padre/crud_padre.php");

$adminEmail = urldecode($_GET['admin']);
$email = urldecode($_GET['padre']);
$crud_p = new Crud_padre($db->connect());
$padre = $crud_p->obtenerPadre($email);

// Procesar el formulario si se envió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    

    // Actualizar los datos del estudiante
    $eliminacionExitosa = $crud_p->eliminarPadre($id);

    if ($eliminacionExitosa) {
        header("Location: gestionarPadre.php?admin=" . $adminEmail);
        ob_end_flush();
        exit();
    } else {
        echo "Error al eliminar los datos del padre.";
    }
} ?>

<!DOCTYPE html>
<html lang="es">

<div class="main-content">
    <main>
        <form method="post" action="">
            <div class="page-header inicio">
                <div>
                    <h1>Eliminar Padre de Familia</h1><br>
                    <h4>¿Está seguro de eliminar este padre?</h4>
                    <div>
                        <p><span>Nombre: </span><?php echo $padre["nombre"]; ?></p>
                    </div>
                    <div>
                        <p><span>Identificación: </span><?php echo $padre["id"]; ?></p>
                    </div>
                    <div>
                        <p><span>Email: </span><?php echo $padre["email"]; ?></h3>
                        </p>
                    </div>
                    <div>
                        <p><span>IdHijo: </span><?php echo $padre["idEs"]; ?></p>
                    </div>
                    <input type="hidden" name="email" value="<?php echo $admin["email"]; ?>">
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
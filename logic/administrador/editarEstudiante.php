<?php
ob_start(); // Inicia el almacenamiento en buffer de salida
include '../../pages/Dashboard/adminDs.php';
include("../../logic/estudiante/crud_e.php");

$crud_e = new Crud_e($db->connect());
$email = urldecode($_GET['estudiante']);
$estudiante = $crud_e->obtenerEstudiante($email);
$adminEmail = urldecode($_GET['admin']);

// Procesar el formulario si se envió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $grado = $_POST["grado"];
    
    // Actualizar los datos del estudiante
    $actualizacionExitosa = $crud_e->editarEstudiante($id, $nombre, $edad, $email, $contrasena, $grado);

    if ($actualizacionExitosa) {
        header("Location: gestionarEstu.php?admin=" . urlencode($adminEmail));
        ob_end_flush(); // Envía el buffer de salida y desactiva el almacenamiento en buffer
        exit();
    } else {
        echo "Error al actualizar los datos del estudiante.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

    <div class="main-content">
        
        <main>
            <form method="post" action="">
                <div class="page-header inicio">
                    <div>
                        <h1>Datos Personales Estudiante</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $estudiante["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $estudiante["id"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Edad: </span>
                                <input type='text' id="edad" name="edad" value="<?php echo $estudiante["edad"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Grado: </span>
                                <input type='text' id="grado" name="grado" value="<?php echo $estudiante["grado"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $estudiante["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $estudiante["contrasena"]; ?>">
                            </p>
                        </div>
                        <input type="hidden" name="adminEmail" value="<?php echo $admin["email"]; ?>">
                        <div class="centrado">
                            <br><br> <button class="boton">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>
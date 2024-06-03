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
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $telefono = $_POST["telefono"];
    $area = $_POST["area"];
    
    // Actualizar los datos del estudiante
    $actualizacionExitosa = $crud_p->editarProfe($id, $nombre, $edad, $email, $contrasena, $telefono,$area);

    if ($actualizacionExitosa) {
        header("Location: gestionarProfe.php?admin=" . urlencode($adminEmail));
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
                        <h1>Datos Personales Profesor</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $profesor["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $profesor["id"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Edad: </span>
                                <input type='text' id="edad" name="edad" value="<?php echo $profesor["edad"]; ?>">
                            </p>
                        </div>                     
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $profesor["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $profesor["contrasena"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Telefeno: </span>
                                <input type='text' id="telefono" name="telefono" value="<?php echo $profesor["telefono"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Area: </span>
                                <input type='text' id="area" name="area" value="<?php echo $profesor["area"]; ?>">
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
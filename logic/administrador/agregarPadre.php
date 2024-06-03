<?php
ob_start(); // Inicia el almacenamiento en buffer de salida
include '../../pages/Dashboard/adminDs.php';
include("../../logic/padre/crud_padre.php");

$crud_p = new Crud_padre($db->connect());
$adminEmail = urldecode($_GET['admin']);

// Procesar el formulario si se envió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $profesion = $_POST["profesion"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $telefono = $_POST["telefono"];
    $idEs = $_POST["idEs"];
      
    
    // Actualizar los datos del estudiante
    $agregacionExitosa = $crud_p->agregarPadre($id, $nombre,$profesion, $email, $contrasena, $telefono,$idEs);

    if ($agregacionExitosa) {
        header("Location: gestionarPadre.php?admin=" . urlencode($adminEmail));
        ob_end_flush(); // Envía el buffer de salida y desactiva el almacenamiento en buffer
        exit();
    } else {
        echo "Error al actualizar los datos del padre.";
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
                        <h1>Datos Personales Padre</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" required>
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" required>
                            </p>
                        </div>                                              
                        <div>
                            <p><span>Email: </span>
                                <input type='email' id="email" name="email" required>
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='password' id="contrasena" name="contrasena" required>
                            </p>
                        </div>
                        <div>
                            <p><span>Profesión: </span>
                                <input type='text' id="profesion" name="profesion">
                            </p>
                        </div>
                        <div>
                            <p><span>Telefono: </span>
                                <input type='text' id="telefono" name="telefono" required>
                            </p>
                        </div>
                        <div>
                            <p><span>ID hijo: </span>
                                <input type='text' id="idEs" name="idEs" required>
                            </p>
                        </div>
                        <input type="hidden" name="adminEmail" value="<?php echo $admin["email"]; ?>">
                        <div class="centrado">
                            <br><br> <button class="boton">Agregar</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
    <script src="/logic/dashboard.js"></script>
</body>

</html>
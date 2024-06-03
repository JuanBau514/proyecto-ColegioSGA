<?php
ob_start(); // Inicia el almacenamiento en buffer de salida
include '../../pages/Dashboard/adminDs.php';
include("../../logic/padre/crud_padre.php");
include("../../logic/estudiante/crud_e.php");
$crud_hijo = new Crud_e($db->connect());
$crud_p = new Crud_padre($db->connect());
$adminEmail = urldecode($_GET['admin']);
if (isset($_GET['padre'])) {
    // Obtener el valor del parámetro 'email' y decodificarlo si es necesario
    $email = urldecode($_GET['padre']);
    $padre = $crud_p->obtenerPadre($email);
    if($padre){
        $hijo = $crud_hijo->obtenerEstudiantePorId($padre["idEs"]);
    }
}

// Procesar el formulario si se envió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $telefono = $_POST["telefono"];
    $idEs = $_POST["idEs"];
    
    // Actualizar los datos del estudiante
    $actualizacionExitosa = $crud_p->editarPadre($id, $nombre, $email, $contrasena, $telefono,$idEs);

    if ($actualizacionExitosa) {
        header("Location: gestionarPadre.php?admin=" . urlencode($adminEmail));
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
                        <h1>Datos Personales Padre</h1>
                        <div>
                            <p><span>Nombre: </span>
                                <input type='text' id="nombre" name="nombre" value="<?php echo $padre["nombre"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Identificación: </span>
                                <input type='text' id="id" name="id" value="<?php echo $padre["id"]; ?>">
                            </p>
                        </div>                                          
                        <div>
                            <p><span>Email: </span>
                                <input type='text' id="email" name="email" value="<?php echo $padre["email"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Contraseña: </span>
                                <input type='text' id="contrasena" name="contrasena" value="<?php echo $padre["contrasena"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>Telefeno: </span>
                                <input type='text' id="telefono" name="telefono" value="<?php echo $padre["telefono"]; ?>">
                            </p>
                        </div>
                        <div>
                            <p><span>idEs: </span>
                                <input type='text' id="idEs" name="idEs" value="<?php echo $padre["idEs"]; ?>">
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
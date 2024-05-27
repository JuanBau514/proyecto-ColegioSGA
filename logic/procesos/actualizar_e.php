<?php
// Verificar si se han recibido datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $grado = $_POST["grado"];

    include("../../logic/estudiante/crud_e.php");
    include("../../config/db.php");

    $db = new DataBase();
    $crud_e = new Crud_e($db->connect());

    $actualizacionExitosa = $crud_e->editarEstudiante($id, $nombre, $edad, $email, $contrasena, $grado);

    if ($actualizacionExitosa) {
        // Redirigir al usuario a la página de perfil del estudiante con el email actualizado
        header("Location: ../../logic/estudiante/perfilEstudiante.php?estudiante=" . urlencode($email));
        exit();
    } else {
        echo "Error al actualizar los datos del estudiante.";
    }
}

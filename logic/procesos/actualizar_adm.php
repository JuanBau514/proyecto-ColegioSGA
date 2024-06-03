<?php
// Verificar si se han recibido datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];    
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $telefono = $_POST["telefono"];

    include("../../logic/administrador/crud_admin.php");
    include("../../config/db.php");

    $db = new DataBase();
    $crud_ad = new Crud_admin($db->connect());

    $actualizacionExitosa = $crud_ad->editarAdmin($id, $nombre, $email, $contrasena, $telefono);

    if ($actualizacionExitosa) {
        // Redirigir al usuario a la página de perfil del estudiante con el email actualizado
        header("Location: ../../logic/administrador/perfilAdmin.php?admin=" . urlencode($email));
        exit();
    } else {
        echo "Error al actualizar los datos del admin.";
    }
}

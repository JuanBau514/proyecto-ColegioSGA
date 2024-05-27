<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $telefono = $_POST["telefono"];

    include("../../logic/profesor/crud_profe.php");
    include("../../config/db.php");

    $db = new DataBase();
    $crud_p = new Crud_profe($db->connect());

    $actualizacionExitosa = $crud_p->editarProfe($id, $nombre, $edad, $email, $contrasena, $telefono);

    if ($actualizacionExitosa) {
        header("Location: ../../logic/profesor/perfilProfesor.php?profesor=" . urlencode($email));
        exit();
    } else {
        echo "Error al actualizar los datos del estudiante.";
    }
}

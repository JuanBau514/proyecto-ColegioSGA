<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $telefono = $_POST["telefono"];
    $idEs = $_POST["idEs"];

    include("../../logic/padre/crud_padre.php");
    include("../../config/db.php");

    $db = new DataBase();
    $crud_p = new Crud_padre($db->connect());

    $actualizacionExitosa = $crud_p->editarPadre($id, $nombre, $email, $contrasena, $telefono, $idEs);

    if ($actualizacionExitosa) {
        header("Location: ../../logic/padre/perfilPadre.php?padre=" . urlencode($email));
        exit();
    } else {
        echo "Error al actualizar los datos del estudiante.";
    }
}

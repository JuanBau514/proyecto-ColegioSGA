<?php

include("../estudiante/estudiante.php");
include("../estudiante/crud_e.php"); 
include("../profesor/profesor.php");
include("../profesor/crud_profe.php"); 
include("../padre/padre.php");
include("../padre/crud_padre.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Nickname_o_Email']) && isset($_POST['Contrasena'])) {
       include("../../config/db.php");
       $db = new DataBase();
       $conexion=$db->connect();
        $email = $_POST['Nickname_o_Email'];
        $contrasena = $_POST['Contrasena'];

       $crud_est = new Crud_e ($conexion);
       $crud_prof = new Crud_profe ($conexion);
       $crud_pad = new Crud_padre ($conexion);

       if ($crud_est->obtenerEstudiante($email)|| $crud_prof->obtenerProfesor($email)|| $crud_pad->obtenerPadre($email)){
        $estudiante = $crud_est->obtenerEstudiante($email);
        $profesor = $crud_prof->obtenerProfesor($email);
        $padre = $crud_pad->obtenerPadre($email);

        if($estudiante && $estudiante["contrasena"]=$contrasena){
            header("Location: ../../pages/Dashboard/estudianteDs.php?estudiante=" .$email);
            exit();
        }
        if($profesor && $profesor["contrasena"]=$contrasena){
            header("Location: ../../logic/profesor/inicio.php?profesor=" .$email);
            exit();
        }
        if($padre && $padre["contrasena"]=$contrasena){
            header("Location: ../../pages/Dashboard/padresDs.php?padre=" .$email);
            exit();
        }
       }

        
    } 
} else {
    echo "Acceso denegado.";
}
?>


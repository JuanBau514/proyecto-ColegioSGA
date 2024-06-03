<?php

include("../estudiante/estudiante.php");
include("../estudiante/crud_e.php"); 
include("../profesor/profesor.php");
include("../profesor/crud_profe.php"); 
include("../padre/padre.php");
include("../padre/crud_padre.php"); 
include("../administrador/admin.php");
include("../administrador/crud_admin.php"); 


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
       $crud_adm = new Crud_admin ($conexion);

       $estudiante = $crud_est->obtenerEstudiante($email);
       $profesor = $crud_prof->obtenerProfesor($email);
       $padre = $crud_pad->obtenerPadre($email);
       $admin = $crud_adm->obtenerAdmin($email);

       if ($estudiante|| $profesor|| $padre || $admin){
        
        if($estudiante && $estudiante["contrasena"]=$contrasena){
            header("Location: ../../logic/estudiante/inicio.php?estudiante=" .$email);
            exit();
        }
        if($profesor && $profesor["contrasena"]=$contrasena){
            header("Location: ../../logic/profesor/inicio.php?profesor=" .$email);
            exit();
        }
        if($padre && $padre["contrasena"]=$contrasena){
            header("Location: ../../logic/padre/inicio.php?padre=" .$email);
            exit();
        }
        if($admin && $admin["contrasena"]=$contrasena){
            header("Location: ../../logic/administrador/inicio.php?admin=" .$email);
            exit();
        }
       }

        
    } 
} else {
    echo "Acceso denegado.";
}
?>


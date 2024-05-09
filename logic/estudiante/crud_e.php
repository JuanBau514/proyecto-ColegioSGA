<?php

class Crud_e {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarEstudiante($nombre, $profesion, $edad, $email, $contrasena, $grado) {

        
        $query = "INSERT INTO estudiantes (Nombre, Profesion, Edad, Email, Contrasena, Grado) VALUES ('$nombre', '$profesion', $edad, '$email', '$contrasena', $grado)";

        
        $result = mysqli_query($this->conexion, $query);

        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerEstudiante($email) {

        
        $query = "SELECT * FROM estudiante WHERE email ='$email'";

        
        $result = mysqli_query($this->conexion, $query);

        
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    
}
?>
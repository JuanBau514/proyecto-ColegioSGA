<?php

class Crud_p {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarProfesor($nombre, $profesion, $edad, $email, $contrasena) {
        $query = "INSERT INTO profesores (Nombre, Profesion, Edad, Email, Contrasena) VALUES ('$nombre', '$profesion', $edad, '$email', '$contrasena')";

        
        $result = mysqli_query($this->conexion, $query);

    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerProfesor($email) {

        
        $query = "SELECT * FROM profesor WHERE email = '$email'";

    
        $result = mysqli_query($this->conexion, $query);

    
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    
}
?>
<?php

class Crud_e {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarEstudiante($id, $nombre, $profesion, $edad, $email, $contrasena, $grado) {
        
        $query = "INSERT INTO estudiante (id, nombre, profesion, edad, email, contrasena, grado) VALUES ('$nombre', '$profesion', '$edad', '$email', '$contrasena', '$grado')";
        
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

    public function editarEstudiante($id, $nombre, $edad, $email, $contrasena, $grado) {

        $query = "UPDATE estudiante SET nombre='$nombre',edad='$edad',email='$email',contrasena='$contrasena',grado='$grado' WHERE id='$id'";
        
        $result = mysqli_query($this->conexion, $query);
       
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    // Nueva función para obtener el estudiante por ID
    public function obtenerEstudiantePorId($id) {
        $query = "SELECT * FROM estudiante WHERE id = '$id'";
        $result = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }



    
}
?>
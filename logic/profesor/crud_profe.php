<?php

class Crud_profe {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarProfesor($id,$nombre, $profesion, $edad, $email, $contrasena, $telefono) {
        $query = "INSERT INTO profesor (id, nombre, profesion, edad, email, contrasena, telefono) VALUES ('$id', '$nombre', '$profesion', '$edad', '$email', '$contrasena', '$telefono')";

        
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

    public function editarProfe($id,$nombre, $edad, $email, $contrasena, $telefono) {

        $query = "UPDATE profesor SET nombre='$nombre',edad='$edad',email='$email',contrasena='$contrasena',telefono='$telefono' WHERE id='$id'";
        
        $result = mysqli_query($this->conexion, $query);
       
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
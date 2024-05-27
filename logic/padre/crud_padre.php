<?php

class Crud_padre {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarPadre($id,$nombre, $profesion, $email, $contrasena, $telefono,$idEs) {
        $query = "INSERT INTO padre (id, nombre, profesion, email, contrasena, telefono, idEs) VALUES ('$id','$nombre', '$profesion', '$email', '$contrasena', '$telefono','$idEs')";

        
        $result = mysqli_query($this->conexion, $query);

    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerPadre($email) {

        
        $query = "SELECT * FROM padre WHERE email = '$email'";

    
        $result = mysqli_query($this->conexion, $query);

    
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    
    public function editarPadre($id,$nombre, $email, $contrasena, $telefono, $idEs,) {

        $query = "UPDATE padre SET nombre='$nombre',email='$email',contrasena='$contrasena',telefono='$telefono',idEs='$idEs' WHERE id='$id'";
        
        $result = mysqli_query($this->conexion, $query);
       
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>
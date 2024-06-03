<?php

class Crud_admin {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarAdmin($id,$nombre, $profesion,$email, $contrasena, $telefono) {
        $query = "INSERT INTO administrador (id, nombre, profesion, email, contrasena, telefono) VALUES ('$id', '$nombre', '$profesion', '$email', '$contrasena', '$telefono')";
        
        $result = mysqli_query($this->conexion, $query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerAdmin($email) {
       
        $query = "SELECT * FROM administrador WHERE email = '$email'";
    
        $result = mysqli_query($this->conexion, $query);
    
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function editarAdmin($id,$nombre, $email, $contrasena, $telefono) {

        $query = "UPDATE administrador SET nombre='$nombre',email='$email',contrasena='$contrasena',telefono='$telefono' WHERE id='$id'";
        
        $result = mysqli_query($this->conexion, $query);
       
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function obtenerTodos() {
        $query = "SELECT * FROM administrador";
        $result = mysqli_query($this->conexion, $query);

        $profesores = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $profesores[] = $row;
            }
        }else {
            return null;
        }
        return $profesores;       
    }

}
?>
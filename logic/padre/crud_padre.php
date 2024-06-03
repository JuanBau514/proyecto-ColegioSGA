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

    public function eliminarPadre($id) {
        $query = "DELETE FROM padre WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);

        return $result;
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM padre";
        $result = mysqli_query($this->conexion, $query);

        $padres = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $padres[] = $row;
            }
        }else {
            return null;
        }
        return $padres;       
    }

     // Esta función supone que existe una relación directa en la base de datos entre un padre y su estudiante
     public function obtenerHorariosDelHijo($idPadre) {
        $query = "SELECT h.Dia, h.Hora FROM horario h 
                  INNER JOIN estudiante e ON h.idGrupo = e.idGrupo 
                  INNER JOIN padre p ON e.id = p.idEstudiante 
                  WHERE p.id = '$idPadre'";
        $result = mysqli_query($this->conexion, $query);

        $horarios = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $horarios[] = $row;
            }
        }
        return $horarios;
    }

}
?>
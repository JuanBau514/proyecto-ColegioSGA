<?php

class Crud_e {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarEstudiante($id, $nombre, $profesion, $edad, $email, $contrasena, $grado) {
       
        $query = "INSERT INTO estudiante (id, nombre, profesion, edad, email, contrasena, grado) VALUES ('$id','$nombre', '$profesion', '$edad', '$email', '$contrasena', '$grado')";
       
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

    public function editarEstudiante($id, $nombre, $edad, $email, $contrasena, $grado) {

        $query = "UPDATE estudiante SET nombre='$nombre',edad='$edad',email='$email',contrasena='$contrasena',grado='$grado' WHERE id='$id'";
        
        $result = mysqli_query($this->conexion, $query);
       
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
   
    public function eliminarEstudiante($id) {
        $query = "DELETE FROM estudiante WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);
        
        if (!$result) {
            echo "Error en la eliminación: " . mysqli_error($this->conexion);
        }

        return $result;
    }

    
    public function obtenerTodos() {
        $query = "SELECT * FROM estudiante";
        $result = mysqli_query($this->conexion, $query);

        $estudiantes = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $estudiantes[] = $row;
            }
        } else {
            return null;
        }
        return $estudiantes;
    }

    public function obtenerHorariosPorEstudiante($idEstudiante) {
        $query = "SELECT h.Dia, h.Hora FROM horario h 
                  INNER JOIN estudiante e ON h.idGrupo = e.idGrupo 
                  WHERE e.id = '$idEstudiante'";
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
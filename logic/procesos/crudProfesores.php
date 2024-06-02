<?php
class Crud_profe {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarProfesor($id, $nombre, $profesion, $edad, $email, $contrasena, $telefono, $area) {
        $query = "INSERT INTO profesor (id, nombre, profesion, edad, email, contrasena, telefono, area) VALUES ('$id', '$nombre', '$profesion', '$edad', '$email', '$contrasena', '$telefono', '$area')";
        $result = mysqli_query($this->conexion, $query);

        return $result;
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

    public function editarProfesor($id, $nombre, $profesion, $edad, $email, $contrasena, $telefono, $area) {
        $query = "UPDATE profesor SET nombre='$nombre', profesion='$profesion', edad='$edad', email='$email', contrasena='$contrasena', telefono='$telefono', area='$area' WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);

        return $result;
    }

    public function eliminarProfesor($id) {
        $query = "DELETE FROM profesor WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);

        return $result;
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM profesor";
        $result = mysqli_query($this->conexion, $query);

        $profesores = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $profesores[] = $row;
            }
        } else {
            return null;
        }
        return $profesores;
    }

    public function obtenerHorariosPorProfesor($idProfesor) {
        $query = "SELECT h.Dia, h.Hora FROM horario h 
                  INNER JOIN profesor p ON h.idGrupo = p.idGrupo 
                  WHERE p.id = '$idProfesor'";
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

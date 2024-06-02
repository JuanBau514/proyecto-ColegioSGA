<?php
class Crud_estudiante {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarEstudiante($id, $nombre, $correo, $contrasena, $idGrupo) {
        $query = "INSERT INTO estudiante (id, nombre, correo, contrasena, idGrupo) VALUES ('$id', '$nombre', '$correo', '$contrasena', '$idGrupo')";
        $result = mysqli_query($this->conexion, $query);

        return $result;
    }

    public function obtenerEstudiante($email) {
        $query = "SELECT * FROM estudiante WHERE correo = '$email'";
        $result = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function editarEstudiante($id, $nombre, $correo, $contrasena, $idGrupo) {
        $query = "UPDATE estudiante SET nombre='$nombre', correo='$correo', contrasena='$contrasena', idGrupo='$idGrupo' WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);

        return $result;
    }

    public function eliminarEstudiante($id) {
        $query = "DELETE FROM estudiante WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);

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

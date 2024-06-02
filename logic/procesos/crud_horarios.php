<?php
class Crud_horarios {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarHorario($materia, $dia, $hora_inicio, $hora_fin, $idGrupo, $idProf) {
        $query = "INSERT INTO horarios (materia, dia, hora_inicio, hora_fin, idGrupo, idProf) VALUES ('$materia', '$dia', '$hora_inicio', '$hora_fin', '$idGrupo', '$idProf')";
        $result = mysqli_query($this->conexion, $query);
        return $result ? true : false;
    }

    public function obtenerHorariosPorGrupo($idGrupo) {
        $query = "SELECT * FROM horarios WHERE idGrupo = '$idGrupo'";
        $result = mysqli_query($this->conexion, $query);
        $horarios = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $horarios[] = $row;
            }
        }
        return $horarios;
    }

    public function obtenerHorariosPorProfesor($idProf) {
        $query = "SELECT * FROM horarios WHERE idProf = '$idProf'";
        $result = mysqli_query($this->conexion, $query);
        $horarios = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $horarios[] = $row;
            }
        }
        return $horarios;
    }

    public function obtenerHorariosPorEstudiante($idEstudiante) {
        $query = "SELECT h.* FROM horarios h
                  JOIN estudiante e ON h.idGrupo = e.idGrupo
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

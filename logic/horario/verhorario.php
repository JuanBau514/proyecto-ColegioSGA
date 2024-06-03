<?php

class Verhorario
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    // Agregar un horario
    public function agregarHorario($idGrupo, $Dia, $Hora)
    {
        $query = "INSERT INTO horario (idGrupo, Dia, Hora) VALUES ('$idGrupo', '$Dia', '$Hora')";
        $result = mysqli_query($this->conexion, $query);
        return $result ? true : false;
    }

    public function obtenerHorario($idGrupo)
    {
        $query = "SELECT horario.dia, horario.hora, grupos.materia FROM horario 
        JOIN grupos ON horario.idGrupo = grupos.idGrupo
            WHERE horario.idGrupo = '$idGrupo'";

        $result = mysqli_query($this->conexion, $query);
        $horario = [];
        if ($result && mysqli_num_rows($result) > 0) {
            // Iterar sobre cada fila de resultados y agregarlas al arreglo de notas
            while ($row = mysqli_fetch_object($result)) {
                $horario[] = $row;
            }
            return $horario;
        } else {
            return [];
        }
    }

// Obtener horarios por profesor
public function obtenerHorariosPorProfesor($idProfesor) {
    $query = "SELECT h.*,g.curso,g.materia  FROM horario h
              JOIN grupos g ON h.idGrupo = g.idGrupo
              WHERE g.idProf = '$idProfesor'";
    $result = mysqli_query($this->conexion, $query);
    $horarios = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $horarios[] = $row;
        }
    }
    return $horarios;
}


    /*
  
    // Obtener horarios por estudiante
    public function obtenerHorariosPorEstudiante($idEstudiante) {
        $query = "SELECT h.* FROM horario h
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

    // Editar un horario
    public function editarHorario($idHorario, $idGrupo, $Dia, $Hora) {
        $query = "UPDATE horario SET idGrupo='$idGrupo', Dia='$Dia', Hora='$Hora' WHERE idHorario='$idHorario'";
        $result = mysqli_query($this->conexion, $query);
        return $result ? true : false;
    }

    // Eliminar un horario
    public function eliminarHorario($idHorario) {
        $query = "DELETE FROM horario WHERE idHorario='$idHorario'";
        $result = mysqli_query($this->conexion, $query);
        return $result ? true : false;
    }
    */
}

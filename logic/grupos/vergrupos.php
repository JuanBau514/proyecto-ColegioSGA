<?php

class Vergrupo
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function agregarGrupo($idGrupo, $materia, $curso, $idProf) {
        $query = "INSERT INTO grupos (idGrupo, materia, curso, idProf) VALUES ('$idGrupo', '$materia', '$curso', '$idProf')";
        $result = mysqli_query($this->conexion, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerGrupo($curso)
    {

        $query = "SELECT idGrupo,materia FROM grupos WHERE curso = '$curso'";

        $result = mysqli_query($this->conexion, $query);

        $grupos = [];
        if ($result && mysqli_num_rows($result) > 0) {
            // Iterar sobre cada fila de resultados y agregarlas al arreglo de notas
            while ($row = mysqli_fetch_assoc($result)) {
                $grupos[] = $row;
            }
            return $grupos;
        } else {
            return [];
        }
    }
 
    public function obtenerTodos() {
        $query = "SELECT * FROM Grupos";
        $result = mysqli_query($this->conexion, $query);

        $grupos = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $grupos[] = $row;
            }
        } else {
            return null;
        }
        return $grupos;
    }

    public function obtenerGrupoProfe($idProf)
    {

        $query = "SELECT curso,materia FROM grupos WHERE idProf = '$idProf'";

        $result = mysqli_query($this->conexion, $query);

        $grupos = [];
        if ($result && mysqli_num_rows($result) > 0) {
            // Iterar sobre cada fila de resultados y agregarlas al arreglo de notas
            while ($row = mysqli_fetch_assoc($result)) {
                $grupos[] = $row;
            }
            return $grupos;
        } else {
            return [];
        }
    }

    /*
    
    public function editarGrupo($idGrupo, $materia, $curso, $idProf) {
        $query = "UPDATE Grupos SET materia='$materia', curso='$curso', idProf='$idProf' WHERE idGrupo='$idGrupo'";
        $result = mysqli_query($this->conexion, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarGrupo($idGrupo) {
        $query = "DELETE FROM Grupos WHERE idGrupo='$idGrupo'";
        $result = mysqli_query($this->conexion, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
   
    */
}

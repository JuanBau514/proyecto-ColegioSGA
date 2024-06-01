<?php

class Crud_grupos {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarGrupo($idGrupo, $materia, $curso, $idProf) {
        $query = "INSERT INTO Grupos (idGrupo, materia, curso, idProf) VALUES ('$idGrupo', '$materia', '$curso', '$idProf')";
        $result = mysqli_query($this->conexion, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerGrupo($idGrupo) {
        $query = "SELECT * FROM Grupos WHERE idGrupo = '$idGrupo'";
        $result = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

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
}
?>

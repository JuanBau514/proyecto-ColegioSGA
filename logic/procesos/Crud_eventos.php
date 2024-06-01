<?php

class Crud_eventos {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function agregarEvento($titulo, $descripcion, $fecha, $frecuencia, $profesor_id) {
        $query = "INSERT INTO eventos (titulo, descripcion, fecha, frecuencia, profesor_id) VALUES ('$titulo', '$descripcion', '$fecha', '$frecuencia', '$profesor_id')";
        $result = mysqli_query($this->conexion, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerEvento($id) {
        $query = "SELECT * FROM eventos WHERE id = '$id'";
        $result = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function editarEvento($id, $titulo, $descripcion, $fecha, $frecuencia) {
        $query = "UPDATE eventos SET titulo='$titulo', descripcion='$descripcion', fecha='$fecha', frecuencia='$frecuencia' WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarEvento($id) {
        $query = "DELETE FROM eventos WHERE id='$id'";
        $result = mysqli_query($this->conexion, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM eventos";
        $result = mysqli_query($this->conexion, $query);

        $eventos = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $eventos[$row['fecha']][] = $row;
            }
        }
        return $eventos;
    }
}
?>

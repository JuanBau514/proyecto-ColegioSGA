<?php

class Vergrupo
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
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
}

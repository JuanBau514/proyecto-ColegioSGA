<?php

class Vernotas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    public function obtenerNotas($idEs)
    {

        $query = "SELECT * FROM notas WHERE idES ='$idEs'";

        $result = mysqli_query($this->conexion, $query);

        $notas = [];
        if ($result && mysqli_num_rows($result) > 0) {
            // Iterar sobre cada fila de resultados y agregarlas al arreglo de notas
            while ($row = mysqli_fetch_assoc($result)) {
                $notas[] = $row;
            }
            return $notas;
        } else {
            return [];
        }
    }
}

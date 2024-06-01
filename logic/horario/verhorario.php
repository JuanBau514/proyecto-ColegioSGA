<?php

class Verhorario
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
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
}

<?php

class Vertareas
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }


    public function obtenerTareas($idGrupo)
    {
        $query = "SELECT tareas.descripcion, tareas.fechaEntrega, grupos.materia FROM tareas 
        JOIN grupos ON tareas.idGrupo = grupos.idGrupo
            WHERE tareas.idGrupo = '$idGrupo'";

        $result = mysqli_query($this->conexion, $query);

        $tareas = [];
        if ($result && mysqli_num_rows($result) > 0) {
            // Iterar sobre cada fila de resultados y agregarlas al arreglo de notas
            while ($row = mysqli_fetch_assoc($result)) {
                $tareas[] = $row;
            }
            return $tareas;
        } else {
            return [];
        }
    }
}

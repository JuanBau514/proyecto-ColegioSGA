<?php

class Tareas {
    private $idTarea;
    private $idGrupo;
    private $descripción;
    private $fechaEntrega;
    
    // Constructor
    public function __construct($idTarea, $idGrupo, $descripción, $fechaEntrega) {
        $this->idTarea = $idTarea;
        $this->idGrupo = $idGrupo;
        $this->descripción = $descripción;
        $this->fechaEntrega = $fechaEntrega;
    }

    // Métodos para obtener información
    public function getIdTarea() {
        return $this->idTarea;
    }

    public function getIdGrupo() {
        return $this->idGrupo;
    }

    public function getDescripción() {
        return $this->descripción;
    }

    public function getfechaEntrega() {
        return $this->fechaEntrega;
    }
   
}
?>


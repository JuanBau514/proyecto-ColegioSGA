<?php

class Horario {
    private $idHorario;
    private $idGrupo;
    private $dia;
    private $hora;
       
    // Constructor
    public function __construct($idHorario, $idGrupo, $dia, $hora) {
        $this->idHorario = $idHorario;
        $this->idGrupo = $idGrupo;
        $this->dia = $dia;
        $this->hora = $hora;
    }

    // Métodos para obtener información
    public function getIdHorario() {
        return $this->idHorario;
    }

    public function getIdGrupo() {
        return $this->idGrupo;
    }

    public function getDia() {
        return $this->dia;
    }

    public function getHora() {
        return $this->hora;
    }
 
}
?>


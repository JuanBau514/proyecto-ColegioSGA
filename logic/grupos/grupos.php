<?php

class Horario {
    private $idProf;
    private $idGrupo;
    private $curso;
    private $materia;
       
    // Constructor
    public function __construct($idGrupo,$idProf, $curso, $materia) {
        $this->idProf = $idProf;
        $this->idGrupo = $idGrupo;
        $this->curso = $curso;
        $this->materia = $materia;
    }

    // Métodos para obtener información
    public function getIdProf() {
        return $this->idProf;
    }

    public function getIdGrupo() {
        return $this->idGrupo;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function getMateria() {
        return $this->materia;
    }
 
}
?>


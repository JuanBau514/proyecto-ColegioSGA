<?php

class Notas {
    private $id;
    private $materia;
    private $periodo;
    private $nota;
    private $idES;
    
    // Constructor
    public function __construct($id, $materia, $periodo, $nota, $idES) {
        $this->id = $id;
        $this->materia = $materia;
        $this->periodo = $periodo;
        $this->nota = $nota;
        $this->idES = $idES;
    }

    // Métodos para obtener información
    public function getId() {
        return $this->id;
    }

    public function getMateria() {
        return $this->materia;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function getNota() {
        return $this->nota;
    }

    public function getIdES() {
        return $this->idES;
    }

    // Método para mostrar la nota
    public function mostrarNota() {
        echo "Materia: {$this->materia}, Periodo: {$this->periodo}, Nota: {$this->nota}\n";
    }
}
?>


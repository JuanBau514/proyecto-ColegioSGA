<?php

class Padre {
    private $id;
    private $nombre;
    private $profesion;
    private $email;
    private $contrasena;
    private $telefono;
    private $idEs;

    // Constructor
    public function __construct($id, $nombre, $profesion, $email, $contrasena, $telefono, $idEs) {
        $this->id =$id;
        $this->nombre = $nombre;
        $this->profesion = $profesion;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->telefono=$telefono;
        $this->idEs=$idEs;
    }

    // Métodos Get
    public function getId() {
        return $this->id;
    } 
    public function getNombre() {
        return $this->nombre;
    }

    public function getProfesion() {
        return $this->profesion;
    }
    public function getEmail() {
        return $this->email;
    }

    public function getContrasena() {
        return $this->contrasena;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function getIdEs() {
        return $this->idEs;
    }

    // Métodos Set
    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setProfesion($profesion) {
        $this->profesion = $profesion;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function setIdEs($idEs) {
        $this->idEs = $idEs;
    }
}
?>

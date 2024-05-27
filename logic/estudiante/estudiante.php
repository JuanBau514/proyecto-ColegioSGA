<?php

class Estudiante {
    private $id;
    private $nombre;
    private $profesion;
    private $edad;
    private $email;
    private $contrasena;
    private $grado;

    // Constructor
    public function __construct($id, $nombre, $profesion, $edad, $email, $contrasena, $grado) {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->profesion = $profesion;
        $this->edad = $edad;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->grado = $grado;
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

    public function getEdad() {
        return $this->edad;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getGrado() {
        return $this->grado;
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

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setGrado($grado) {
        $this->grado = $grado;
    }
}
?>

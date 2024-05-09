<?php

class Estudiante {
    private $nombre;
    private $profesion;
    private $edad;
    private $email;
    private $contrasena;
    private $grado;

    // Constructor
    public function __construct($nombre, $profesion, $edad, $email, $contrasena, $grado) {
        $this->nombre = $nombre;
        $this->profesion = $profesion;
        $this->edad = $edad;
        $this->email = $email;
        $this->contrasena = $contrasena;
        $this->grado = $grado;
    }

    // Métodos Get
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

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Chelo
 */
class Usuario {
    private $id;
    private $nombre;
    private $contrasenia;
    
    
    
    public function __construct($id, $nombre, $contrasenia) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->contrasenia = $contrasenia;
    }
    
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }


    
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Chelo
 */
class Producto {
    private $id;
    private $nombre;
    private $rutaDeImagen;
    private $precio;
    
    public function __construct($id, $nombre, $rutaDeImagen, $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->rutaDeImagen = $rutaDeImagen;
        $this->precio = $precio;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRutaDeImagen() {
        return $this->rutaDeImagen;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setRutaDeImagen($rutaDeImagen) {
        $this->rutaDeImagen = $rutaDeImagen;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }


}

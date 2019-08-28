<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Producto.php");


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAO_Producto
 *
 * @author Chelo
 */
class DAO_Producto extends Conexion implements DAO {

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_pizarroWeb", "root", "");
    }

    public function create($objeto) {
        $this->c->conectar();
        $query = "CALL CRUDProducto (NULL, '" . $objeto->getNombre() . "', '" . $objeto->getRutaDeImagen() . "', '" . $objeto->getPrecio() . "'   ,1);";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query = "CALL CRUDProducto (1, '2', '3',1333, 2);";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Producto(1,'2','3',1333);
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setRutaDeImagen($reg[2]);
            $obj->setPrecio($reg[3]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function update($objeto) {

        $this->c->conectar();
        $query = $query = "CALL CRUDProducto (".$objeto->getId().", '" . $objeto->getNombre() . "', '" . $objeto->getRutaDeImagen() . "', ".$objeto->getPrecio()."   ,3);";
        $this->c->ejecutar($query);
    }

    public function delete($objeto) {
        $this->c->conectar();
        $query = "CALL CRUDProducto (".$objeto->getId().", '" . $objeto->getNombre() . "', '" . $objeto->getRutaDeImagen() . "', ".$objeto->getPrecio()."   ,4);";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function findById($id) {
        $this->c->conectar();
        $query = "CALL CRUDProducto (".$id.", '2', '3',1333, 2);";
        $obj=new Producto(1, "lol","lol", 1333);
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Producto();
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setRutaDeImagen($reg[2]);
            $obj->setPrecio($reg[3]);

            
        }
        $this->c->desconectar();
        return $obj;
    }

//put your code here
}

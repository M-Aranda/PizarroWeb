<?php

require_once("DAO.php");
require_once("../Model/Conexion.php");
require_once("../Model/Usuario.php");

class DAO_Usuario extends Conexion implements DAO {

    private $c;

    public function __construct() {
        $this->c = new Conexion(
                "bd_pizarroWeb", "root", "");
    }

    public function create($objeto) {
        $this->c->conectar();
        $query = "CALL CRUDUsuario (NULL, '" . $objeto->getNombre() . "', '" . $objeto->getContrasenia() . "', 1);";

        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function read() {
        $this->c->conectar();
        $query = "CALL CRUDUsuario(1,'2','2',2);";
        $listado = array();
        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {
            $obj = new Usuario(1, 'No encontrado', 'Invalido');
            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setContrasenia($reg[2]);

            $listado[] = $obj;
        }
        $this->c->desconectar();
        return $listado;
    }

    public function update($objeto) {

        $this->c->conectar();
        $query = "CALL CRUDUsuario (" . $objeto->getId() . ", '" . $objeto->getNombre() . "', '" . $objeto->getContrasenia() . "', 3);";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function delete($objeto) {
        $this->c->conectar();
        $query = "CALL CRUDUsuario (" . $objeto->getId() . ", '" . $objeto->getNombre() . "', '" . $objeto->getContrasenia() . "', 4);";
        $this->c->ejecutar($query);
        $this->c->desconectar();
    }

    public function findById($id) {
        $this->c->conectar();
        $query = "SELECT * FROM Usuario WHERE id=" . $id . ";";

        $obj = new Usuario(1, 'No encontrado', 'Invalido');

        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {

            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setContrasenia($reg[2]);
        }
        $this->c->desconectar();
        return $obj;
    }

    public function buscarCoincidenciaDeUsuario($nombre, $contrasenia) {
        $this->c->conectar();
        $query = "SELECT * FROM Usuario WHERE nombre='" . $nombre . "' AND contrasenia='" . $contrasenia . "' ;";

        $obj = new Usuario(1, 'No encontrado', 'Invalido');

        $rs = $this->c->ejecutar($query);
        while ($reg = $rs->fetch_array()) {

            $obj->setId($reg[0]);
            $obj->setNombre($reg[1]);
            $obj->setContrasenia($reg[2]);
        }
        $this->c->desconectar();
        return $obj;
    }

}

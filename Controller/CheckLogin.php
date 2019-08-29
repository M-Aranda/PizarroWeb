<?php

require_once("../Model/Conexion.php");
require_once("../Model/Usuario.php");
require_once("../Model/DAO/DAO_Usuario.php");

$nombre = $_REQUEST["txtNombre"];
$contrasenia = $_REQUEST["txtPass"];

$dao_usuario = new DAO_Usuario();

$ubicacion="location: ../View/home.php";

$usuario = $dao_usuario->buscarCoincidenciaDeUsuario($nombre, $contrasenia);
if ($usuario->getNombre() == "No encontrado") {
    $ubicacion="location: ../View/PaginasDeError/errorUsuarioSinCoincidencias.php";
    
} 

header($ubicacion);

?>
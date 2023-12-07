<?php
$servidor = "localhost";
$usuario = "admin";
$pass = "estacionamientoc";
$bdname = "estacionamiento";

$conexion = new mysqli($servidor,$usuario,$pass, $bdname);
if($conexion->connect_error){
    die("Error de conexion:".$conexion->connect_error);

}
?>
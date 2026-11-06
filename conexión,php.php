<?php

$servidor = "127.0.0.1";
$usuario = "root";
$password = "";
$baseDatos = "agenda_contactos";

$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
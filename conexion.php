
<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "agenda_contactos";

// Crear conexión
$conexion = new mysqli(
    $servidor,
    $usuario,
    $password,
    $base_datos
);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar caracteres
$conexion->set_charset("utf8mb4");
?>

<?php

require_once __DIR__ . "/config/conexion.php";

// Comprobar que los datos lleguen mediante POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Recibir los datos del formulario
$nombre = trim($_POST["nombre"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$email = trim($_POST["email"] ?? "");

// Validar que los campos estén completos
if ($nombre === "" || $telefono === "" || $email === "") {
    header("Location: index.php?error=datos");
    exit;
}

// Validar la longitud de los campos
if (
    strlen($nombre) > 100 ||
    strlen($telefono) > 30 ||
    strlen($email) > 120
) {
    header("Location: index.php?error=datos");
    exit;
}

// Validar el formato del correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?error=datos");
    exit;
}

// Preparar la consulta SQL
$sql = "INSERT INTO contactos (nombre, telefono, email)
        VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);

// Asociar los datos a la consulta
$stmt->bind_param("sss", $nombre, $telefono, $email);

// Ejecutar la consulta
if ($stmt->execute()) {

    header("Location: index.php?guardado=1");
    exit;

} else {

    header("Location: index.php?error=guardar");
    exit;
}

// Cerrar conexiones
$stmt->close();
$conexion->close();

?>
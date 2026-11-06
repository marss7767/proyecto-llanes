<?php

require_once __DIR__ . "/config/conexion.php";

// Comprobar que los datos lleguen mediante POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

// Recibir los datos del formulario
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$nombre = trim($_POST["nombre"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$email = trim($_POST["email"] ?? "");

// Validar el identificador
if (!$id) {
    header("Location: index.php?error=noexiste");
    exit;
}

// Validar que los campos estén completos
if ($nombre === "" || $telefono === "" || $email === "") {
    header("Location: editar_contacto.php?id=" . $id . "&error=datos");
    exit;
}

// Validar la longitud de los campos
if (
    strlen($nombre) > 100 ||
    strlen($telefono) > 30 ||
    strlen($email) > 120
) {
    header("Location: editar_contacto.php?id=" . $id . "&error=datos");
    exit;
}

// Validar el formato del correo electrónico
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: editar_contacto.php?id=" . $id . "&error=datos");
    exit;
}

// Preparar la consulta SQL de actualización
$sql = "UPDATE contactos
        SET nombre = ?, telefono = ?, email = ?
        WHERE id_contacto = ?";

$stmt = $conexion->prepare($sql);

// Asociar los datos a la consulta (sss + i para el id)
$stmt->bind_param("sssi", $nombre, $telefono, $email, $id);

// Ejecutar la consulta
if ($stmt->execute()) {

    $stmt->close();
    $conexion->close();

    header("Location: index.php?actualizado=1");
    exit;

} else {

    $stmt->close();
    $conexion->close();

    header("Location: editar_contacto.php?id=" . $id . "&error=actualizar");
    exit;
}
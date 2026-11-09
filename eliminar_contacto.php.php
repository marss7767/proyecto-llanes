<?php

require_once __DIR__ . "/config/conexion.php";

// Solo aceptar POST (evita borrados por URL)
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php?error=noexiste");
    exit;
}

$sql = "DELETE FROM contactos WHERE id_contacto = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    $stmt->close();
    $conexion->close();

    header("Location: index.php?eliminado=1");
    exit;
}

$stmt->close();
$conexion->close();

header("Location: index.php?error=eliminar");
exit;